@extends('layout-login')

@section('title')
    {{ __('messages.welcome-title') }}
@endsection

@section('content')
    <h1 class="mt-5">{{ __('messages.welcome-text') }}</h1>
    <img class="img-welcome" src="media/logo.png" alt="{{ __('messages.alt_logo') }}">
    <h3 class="mt-5 mb-5 page-title">{{ __('messages.welcome-info') }}</h3>
    <a href="register">
        <div class="btn btn-primary btn-lg rounded mt-5 mb-5">{{ __('messages.welcome-button') }}</div>
    </a>
@endsection
