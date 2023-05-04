@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div>
        {{$user->user}}
        {{__('messages.settings-text')}}
    </div>

@endsection
