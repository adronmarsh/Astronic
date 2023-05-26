<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Support\Str;
use League\Flysystem\Filesystem;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;

class NoticeController extends Controller
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
        $userId = Auth()->id();
        $user = User::findOrFail($userId);
        if ($user->rol == 'corporation')
            return view('notice.create');
        return redirect()->route('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoticeRequest $request)
    {
        $notice = new Notice;
        $notice->user_id = Auth()->id();
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

            $path = '/notices/' . $fileName;

            $filesystem->write($path, file_get_contents($file));

            $url = env('AWS_URL') . $path;
            $notice->media = $url;
        }
        $notice->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($noticeId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userNotices($userId)
    {
        $notices = Notice::where('user_id', $userId)->get();
        return view('notice.notices', compact('notices'));
    }
}
