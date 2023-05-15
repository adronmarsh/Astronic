@extends('layout')

@section('title', 'Posts')

@section('content')
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="col-md-6 mx-auto">
    @csrf
    <h1 class="mt-5">Publicar Post</h1>
    <div class="form-group mt-5">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mt-5">
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mt-5">
        <label for="media" class="btn btn-transparent">
            <i class="fas fa-upload"></i> Subir imagen o video
        </label>
        <input type="file" name="media" id="media" class="form-control-file">
        @error('media')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-5">Crear post</button>
</form>



@endsection
