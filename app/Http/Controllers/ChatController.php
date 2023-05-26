<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $chats = Chat::where('user_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('chat.index', compact(['chats', 'userId']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($receiverId)
    {
        $userId = auth()->id();
        $chat = Chat::where(function ($query) use ($userId, $receiverId) {
            $query->where('user_id', $userId)->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('user_id', $receiverId)->where('receiver_id', $userId);
        })->first();

        if ($chat == null) {
            return redirect()->route('newChat', compact('receiverId'));
        }
        $messages = $chat->messages()->orderBy('created_at', 'asc')->get();
        $receiver = User::where('id', $receiverId)->first();

        if ($chat->user_id != $userId && $chat->receiver_id != $userId){
            return redirect()->route('/');
        }

        return view('chat.show', compact('chat', 'receiver', 'messages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();
        return redirect()->route('chat.index');
    }

    public function newChat($receiverId)
    {
        $chat = new Chat;
        $chat->user_id = auth()->id();
        $chat->receiver_id = $receiverId;
        $chat->save();
        return redirect()->route('chat.show', $receiverId);
    }
}
