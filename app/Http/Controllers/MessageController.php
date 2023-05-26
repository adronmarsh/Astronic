<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($chatId)
    {
        $chat = Chat::findOrFail($chatId);
        $messages = $chat->messages()->orderBy('created_at', 'asc')->get();

        return view('messages.index', compact('chat', 'messages'));
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
    public function store(MessageRequest $request)
    {
        $message = new Message();
        $message->content = $request->input('content');
        $message->chat_id = $request->input('chat_id');
        $message->user_id = $request->input('user_id');
        $message->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
}
