@extends('layout')

@section('title') {{ __('messages.upload-notice-title') }} @endsection


@section('content')
    <form method="POST" action="{{ route('notice.store') }}" enctype="multipart/form-data" class="col-md-6 mx-auto">
        @csrf
        <h1 class="mt-5">{{ __('messages.upload-notice-text') }}</h1>

        <div class="form-group mt-5">
            <label for="media" class="btn btn-transparent">
                <i class="fas fa-upload"></i>{{ __('messages.upload-notice-file') }}
            </label>
            <input type="file" name="media" id="media" class="form-control-file">
            @error('media')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-5">{{ __('messages.upload-notice-create') }}</button>
    </form>
@endsection
