@extends('layout')

@section('title', 'Cuenta')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('account.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1 class="mb-4">Editar perfil</h1>
                <div class="text-center mb-3">
                    <label for="avatar">
                        <img class="rounded-circle mb-3 avatar-edit"
                            src="{{ $user->avatar != null ? asset($user->avatar) : asset('media/default-avatar.png') }}"
                            alt="Foto de perfil de {{ $user->user }}" width="150">
                    </label>
                    <div class="custom-file">
                        <input type="file" style="display:none" id="avatar" name="avatar">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="user" id="user" value="{{ $user->user }}">
                </div>
                <div class="form-group">
                    <label for="bio">Biografía:</label>
                    <textarea class="form-control" name="bio" id="bio" rows="5">{{ $user->bio }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Guardar cambios</button>
            </form>
        </div>
    </div>


@endsection
