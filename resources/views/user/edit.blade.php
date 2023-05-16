@extends('layout')

@section('title', 'Cuenta')

@section('content')
    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="col-md-6 mx-auto">
        @csrf
        @method('PUT')
        <h1 class="mt-5">Editar perfil</h1>
        <div class="text-center mt-5">
            <label for="avatar">
                <img class="rounded-circle avatar-edit"
                    src="{{ $user->avatar != null ? asset($user->avatar) : asset('media/default-avatar.png') }}"
                    alt="Foto de perfil de {{ $user->user }}" width="150">
            </label>
            <div class="custom-file">
                <input type="file" style="display:none" id="avatar" name="avatar">
            </div>
        </div>
        <div class="form-group mt-5">
            <label for="user">Nombre de usuario:</label>
            <input type="text" class="form-control" name="user" id="user" value="{{ $user->user }}">
        </div>
        <div class="form-group mt-5">
            <label for="bio">Biografía:</label>
            <textarea class="form-control" name="bio" id="bio" rows="5">{{ $user->bio }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-5">Guardar cambios</button>
    </form>
@endsection
