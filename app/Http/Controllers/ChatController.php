<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // Mostrar la lista de chats disponibles para el usuario
        $chats = Chat::where('user_id', auth()->id())->get();
        return view('chat.index', compact('chats'));
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
    public function store(Request $request)
    {
        // Crear un nuevo chat entre el usuario y otro participante
        $validatedData = $request->validate([
            'name' => 'required',
            'participant_id' => 'required',
        ]);

        $chat = Chat::create([
            'name' => $validatedData['name'],
            'user_id' => auth()->id(),
            'participant_id' => $validatedData['participant_id'],
        ]);

        return redirect()->route('chat.show', $chat->id);
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
        // Actualizar la conversación en curso
        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        $chat = Chat::findOrFail($id);
        $chat->messages()->create([
            'user_id' => auth()->id(),
            'message' => $validatedData['message'],
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar un chat existente
        $chat = Chat::findOrFail($id);
        $chat->delete();
        return redirect()->route('chat.index');
    }
}
