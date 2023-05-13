@extends('layout-login')

@section('title')
    {{__('messages.login-title')}}
@endsection

@section('content')
    <div>
        <h1 class="mt-5">{{_('messages.login-title')}}</h1>
        <a href="/">
            <img class="img-welcome" src="media/logo.png" alt="Astronic Logo">
        </a>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="user">
                <h3 class="mt-5 mb-5 page-title">{{__('messages.login-text')}}</h3>
            </label>
            <br>
            <input type="text" name="user" id="user">
            <br>
            <label for="password">
                <h3 class="mt-5 mb-5 page-title">{{__('messages.login-password')}}</h3>
            </label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            <a href="index">
                <input type="submit" value="{{__('messages.welcome-button')}}" class="btn btn-primary btn-lg rounded mt-5 mb-5">
            </a>
        </form>
    </div>
    @isset($error)
        {{ $error }}
    @endisset
    </div>
@endsection
