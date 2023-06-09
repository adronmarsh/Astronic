<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\Filesystem;
use Aws\S3\S3Client;
use Illuminate\Support\Str;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        if ($userId == auth()->id()) {
            return redirect()->route('account');
        }
        $isFollowing = Follow::where('user_id', $userId)
            ->where('follower_id', auth()->id())
            ->exists();
        $followers = Follow::where('user_id', $userId)->count();
        $following = Follow::where('follower_id', $userId)->count();
        $user = User::findOrFail($userId);
        $posts = Post::where('user_id', $userId)->latest()->get();
        return view('user.show', compact(['user', 'posts', 'isFollowing', 'followers', 'following']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        $posts = Post::where('user_id', $userId)->latest()->get();
        return view('user.edit', compact(['user', 'posts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, User $user)
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);

        $user->user = $request->get('user');
        $user->bio = $request->get('bio');
        $user->rol = $user->rol;
        $user->email = $user->email;
        $user->password = $user->password;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
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

            $path = '/avatar/' . $fileName;

            $filesystem->write($path, file_get_contents($file));

            $url = env('AWS_URL') . $path;
            if ($user->avatar != null) {
                $oldAvatar = str_replace(env('AWS_URL'), '', $user->getOriginal('avatar'));
                $filesystem->delete($oldAvatar);
            }
            $user->avatar = $url;
        }
        $user->avatar = $user->avatar;

        $user->save();
        return redirect()->route('account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function account()
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        $posts = Post::where('user_id', $userId)->latest()->get();
        $followers = Follow::where('user_id', $userId)->count();
        $following = Follow::where('follower_id', $userId)->count();
        return view('user.account', compact(['user', 'posts', 'followers', 'following']));
    }

    public function follow($userId)
    {
        $isFollowing = Follow::where('user_id', $userId)
            ->where('follower_id', auth()->id())
            ->exists();

        if ($isFollowing) {
            $follow = Follow::where('user_id', $userId)->where('follower_id', auth()->id())->first();
            $isFollowing = false;
            $follow->delete();
        } else {
            $follow = new Follow;
            $follow->user_id = $userId;
            $follow->follower_id = auth()->id();
            $isFollowing = true;
            $follow->save();
        }

        return redirect()->back();
    }
}
