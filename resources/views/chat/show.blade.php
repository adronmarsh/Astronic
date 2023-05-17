@extends('layout')

@section('title', 'Chat')

@section('content')
    <div class="row justify-content-start">
        <div class="mt-5">
            @if ($chat)
                <img class="avatar rounded-circle img-ms"
                    src="{{ $receiver->avatar != null ? $receiver->avatar : asset('media/default-avatar.png') }}"
                    alt="Foto de perfil de {{ $receiver->user }}">
                <h1>{{ $receiver->user }}</h1>

                <div class="chat-container">
                    <div class="messages">
                        @foreach ($messages as $message)
                            <div class="message @if ($message->user_id === Auth::user()->id) text-end @else text-start @endif">
                                <div
                                    class="m-1 message-content d-inline-block d-inline-block rounded @if ($message->user_id === $receiver->id) bg-secondary text-white @else bg-primary text-white @endif">
                                    <p class="p-2 m-0">{{ $message->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p>No se encontró ningún chat.</p>
            @endif
        </div>
    </div>

    <div class="input-chat-bottom bg-light">
        <form method="POST" action="{{ route('messages.store', $chat->id) }}" id="message-form">
            @csrf

            <div class="form-group d-flex justify-content-end">
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                <button type="submit" class="btn btn-link">
                    <i class="bi bi-arrow-right-circle-fill bi-lg"></i>
                </button>
            </div>

            <input type="hidden" name="chat_id" value="{{ $chat->id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </form>
    </div>
@endsection
