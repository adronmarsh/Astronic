@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div>
        {{$user->user}}
    </div>

@endsection
