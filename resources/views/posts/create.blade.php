@extends('layout')

@section('title') {{ __('messages.upload-post-title') }} @endsection

@section('content')
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="col-md-6 mx-auto">
        @csrf
        <h1 class="mt-5">{{ __('messages.upload-post-text') }}</h1>
        <div class="form-group mt-5">
            <label for="title">{{ __('messages.upload-post-name') }}</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mt-5">
            <label for="content">{{ __('messages.upload-post-content') }}</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mt-5">
            <label for="media" class="btn btn-transparent">
                <i class="fas fa-upload"></i>{{ __('messages.upload-post-file') }}
            </label>
            <input type="file" name="media" id="media" class="form-control-file">
            @error('media')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-5">{{ __('messages.upload-post-create') }}</button>
    </form>
@endsection
