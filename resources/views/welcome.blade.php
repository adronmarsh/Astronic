@extends('layout-login')

@section('title')
    {{ __('messages.welcome-title') }}
@endsection

@section('content')
    <h1 class="mt-5">{{ __('messages.welcome-text') }}</h1>
    <img class="img-welcome mt-3" src="media/logo.svg" alt="{{ __('messages.alt_logo') }}">
    <h3 class="mt-3 mb-3 text-center p-5 w-100">{{ __('messages.welcome-info') }}</h3>
    <a href="register">
        <div class="btn btn-primary btn-lg rounded mt-3 mb-3">{{ __('messages.welcome-button') }}</div>
    </a>
@endsection
