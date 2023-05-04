@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div>
        <div>
            {{ $user->user }}
            <input type="text">
        </div>
        <div class="chat-user"></div>
        <div class="chat-user"></div>
        <div class="chat-user"></div>
        <div class="chat-user"></div>
        <div class="chat-user"></div>
        <div class="chat-user"></div>
    </div>
    <div>
        <div>
            Mónica Ortiz
        </div>
        <div class="chat">

        </div>
    </div>
    <script src="{{ asset('js/font.js') }}"></script>

@endsection
