@extends('layout')

@section('title', 'Posts')

@section('content')
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="p-4 border rounded">
    @csrf

    <div class="form-group">
        <label for="title">Título del post:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Contenido del post:</label>
        <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Media:</label>
        <input type="file" name="media" id="media" class="form-control-file">
        @error('media')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crear post</button>
</form>



@endsection
