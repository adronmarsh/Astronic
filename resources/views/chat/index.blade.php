@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div>
        <div>
            <form method="POST" action="{{ route('searchChat') }}" class="form-inline" id="searchForm">
                @csrf
                <div class="form-group">
                    <label for="searchInput" class="sr-only"></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchChat" placeholder="Buscar...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-none">Buscar</button>
            </form>


        </div>

        <ul>
            @foreach ($chats as $chat)
                <li>
                    <a href="/chats/{{ $chat->user_id }}/{{ $chat->receiver_id }}">
                        Chat con {{ $chat->user_id == $userId ? $chat->receiver->user : $chat->user->user }}
                    </a>
                </li>
            @endforeach
        </ul>


        <div class="chat-user">a</div>
        <div class="chat-user">a</div>
        <div class="chat-user">a</div>
        <div class="chat-user">a</div>
        <div class="chat-user">a</div>
    </div>
    <div>
        <div>
            Mónica Ortiz
        </div>
        <div class="chat">

        </div>
    </div>

@endsection
