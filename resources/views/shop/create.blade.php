@extends('layout')

@section('title') {{ __('messages.upload-product-title') }} @endsection


@section('content')
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data" class="col-md-6 mx-auto">
        @csrf
        <h1 class="mt-5">{{ __('messages.upload-product-text') }}</h1>
        <div class="form-group mt-5">
            <label for="name">{{ __('messages.upload-product-name') }}</label>
            <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mt-5">
            <label for="price">{{ __('messages.upload-product-price') }}</label>
            <textarea name="price" id="price" class="form-control" required>{{ old('price') }}</textarea>
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mt-5">
            <label for="media" class="btn btn-transparent">
                <i class="fas fa-upload"></i>{{ __('messages.upload-product-file') }}
            </label>
            <input type="file" name="media" id="media" class="form-control-file">
            @error('media')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-5">{{ __('messages.upload-product-create') }}</button>
    </form>
@endsection
