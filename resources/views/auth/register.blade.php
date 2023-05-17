@extends('layout-login')

@section('title')
    {{ __('messages.register-title') }}
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-5">{{ __('messages.register-text') }}</h1>
        <a href="/">
            <img class="img-welcome mt-3" src="media/logo.svg" alt="{{ __('messages.alt_logo') }}">
        </a>
        @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="col-md-6 mx-auto d-flex justify-content-center row">
            @csrf

            <div class="form-group w-50">
                <label for="user" class="mt-5 mb-3">{{ __('messages.login-user') }}</label>
                <input type="text" name="user" id="user" class="form-control">
            </div>
            <div class="form-group w-50">
                <label for="email" class="mt-5 mb-3">{{ __('messages.register-email') }}</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group w-50">
                <label for="password" class="mt-5 mb-3">{{ __('messages.login-password') }}</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group w-50">
                <label for="password_confirmation" class="mt-5 mb-3">{{ __('messages.register-confirm_password') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="form-group w-50">
                <label for="rol" class="mt-5 mb-3">{{ __('messages.register-account_type') }}</label>
                <select id="rol" name="rol" class="form-control text-center">
                    <option value="corporation">{{ __('messages.register-corporation') }}</option>
                    <option value="particular">{{ __('messages.register-individual') }}</option>
                </select>
            </div>

            <button type="submit"
                class="btn btn-primary btn-lg rounded mt-5 mb-5">{{ __('messages.register-submit_button') }}</button>
            <a href="login" class="text-decoration-none text-link">{{ __('messages.login-already_registered') }}</a>
        </form>


    </div>
@endsection
