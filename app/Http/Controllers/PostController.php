<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use League\Flysystem\Filesystem;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        if ($user->rol!='corporation') {
            return redirect()->route('/');
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        if ($user->rol=='particular'){
            abort(403, 'No tienes permisos para publicar un post.');
        }
        $post = new Post;
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->user_id = auth()->user()->id;

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $adapter = new AwsS3V3Adapter(
                new S3Client([
                    'region' => env('AWS_DEFAULT_REGION'),
                    'version' => 'latest',
                    'credentials' => [
                        'key' => env('AWS_ACCESS_KEY_ID'),
                        'secret' => env('AWS_SECRET_ACCESS_KEY')
                    ]
                ]),
                env('AWS_BUCKET')
            );

            $filesystem = new Filesystem($adapter);

            $path = '/posts/' . $fileName;

            $filesystem->write($path, file_get_contents($file));

            $url = env('AWS_URL') . $path;
            $post->url = $url;
        }

        $post->save();

        return redirect()->route('index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }


    public function like($postId)
    {
        $userId = auth()->id();
        $post = Post::findOrFail($postId);
        $likesCount = Like::where('post_id', $postId)->count();

        if ($post->likes()->where('user_id', $userId)->exists()) {
            $like = Like::where('post_id', $postId)->where('user_id', $userId)->first();
            $like->delete();

        } else {

            $like = new Like();
            $like->post_id = $postId;
            $like->user_id = auth()->id();
            $like->save();

        }
        return response()->json(['likes_count' => $likesCount]);
    }
}
