<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chat;

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
    public function show($id)
    {
        // Mostrar la conversación entre el usuario y otro participante del chat
        $chat = Chat::findOrFail($id);
        $messages = $chat->messages;
        return view('chat.show', compact('chat', 'messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $receiverId)
    {
        $chat = new Chat;
        $chat->user_id = auth()->id();
        $chat->receiver_id = $receiverId;
        $chat->message = $request->input('message');
        $chat->save();
        return redirect()->back();
    }

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

    public function getChatMessages($userId, $receiverId)
    {
        $messages = Chat::where(function ($query) use ($userId, $receiverId) {
                        $query->where('user_id', $userId)
                              ->where('receiver_id', $receiverId);
                    })
                    ->orWhere(function ($query) use ($userId, $receiverId) {
                        $query->where('user_id', $receiverId)
                              ->where('receiver_id', $userId);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

        return redirect()->back()->with('messages', $messages);

    }
}
