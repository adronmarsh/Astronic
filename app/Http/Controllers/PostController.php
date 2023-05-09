<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos enviados por el formulario
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048', // Máximo 2MB
        'video' => 'nullable|mimes:mp4|max:20480', // Máximo 20MB
    ]);

    // Crear un nuevo post en la base de datos
    $post = new Post;
    $post->title = $validatedData['title'];
    $post->content = $validatedData['content'];
    $post->user_id = auth()->user()->id;; // Asociar el post al usuario actual

    // Subir la imagen
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
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

        $path = 'images/' . $fileName;

        $filesystem->write($path, file_get_contents($image));

        $imageUrl = Storage::disk('s3')->url($path);

        $post->image_url = $imageUrl;
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
}
