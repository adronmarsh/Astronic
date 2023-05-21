@extends('layout')

@section('title') {{ __('messages.upload-title') }} @endsection

@section('content')

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col text-center">
            <h3>{{ __('messages.upload-text') }}</h3>
            <a href="posts/create" class="btn btn-primary mr-3">
                <i class="fas fa-upload"></i> {{ __('messages.upload-post') }}
            </a>
            <a href="product/create" class="btn btn-primary mr-3">
                <i class="fas fa-upload"></i> {{ __('messages.upload-product') }}
            </a>
            <a href="notice/create" class="btn btn-primary">
                <i class="fas fa-upload"></i> {{ __('messages.upload-notice') }}
            </a>
        </div>
    </div>
</div>
@endsection
