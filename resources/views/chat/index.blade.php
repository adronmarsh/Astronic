@extends('layout')

@section('title', 'Chat')

@section('content')
    <div class="row justify-content-start">
        <div class="col mt-5">
            <h2>Chats</h2>
            <ul class="list-group">
                @foreach ($chats as $chat)
                    <a class="text-decoration-none" href="{{ route('chat.show', $chat->receiver->id) }}">
                        <li class="list-group-item text-start">
                            @auth
                                @if (Auth::user()->id == $chat->user_id)
                                    <img class="avatar rounded-circle img-ms"
                                        src="{{ $chat->receiver->avatar != null ? $chat->receiver->avatar : asset('media/default-avatar.png') }}"
                                        alt="Foto de perfil de {{ $chat->receiver->user }}">

                                    {{ $chat->receiver->user }}
                                @else
                                    <img class="avatar rounded-circle img-ms"
                                        src="{{ $chat->user->avatar != null ? $chat->user->avatar : asset('media/default-avatar.png') }}"
                                        alt="Foto de perfil de {{ $chat->user->user }}">
                                    {{ $chat->user->user }}
                                @endif
                            @endauth
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
