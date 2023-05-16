@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <div class="row justify-content-start">
        <div class="col mt-5">
            <h2>Usuarios</h2>
            <ul class="list-group">
                @foreach ($users as $user)
                    <li class="list-group-item">
                        <a href="/users/{{ $user->id }}" class="text-decoration-none text-reset">
                            <img class="avatar rounded-circle img-ms"
                                src="{{ $user->avatar != null ? $user->avatar : asset('media/default-avatar.png') }}"
                                alt="Foto de perfil de {{ $user->user }}">
                            {{ $user->user }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
