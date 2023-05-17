@extends('layout-login')

@section('title')
    {{ __('messages.login-title') }}
@endsection

@section('content')
    <div>
        <h1 class="mt-5">{{ __('messages.login-title') }}</h1>
        <a href="/">
            <img class="img-welcome mt-5" src="media/logo.svg" alt="{{ __('messages.alt_logo') }}">
        </a>
        @isset($error)
            <div class="alert alert-danger mt-5">{{ $error }}</div>
        @endisset
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user" class="mt-5 mb-3">{{ __('messages.login-user') }}</label>
                <input type="text" class="form-control" name="user" id="user">
            </div>
            <div class="form-group">
                <label for="password" class="mt-5 mb-3">{{ __('messages.login-password') }}</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5 mb-5">{{ __('messages.welcome-button') }}</button>
        </form>
    </div>
@endsection
