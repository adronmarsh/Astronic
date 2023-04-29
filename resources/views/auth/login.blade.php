@extends('layout-login')

@section('title', 'Inicio')

@section('content')
    <div>
        <h1 class="mt-5"><?php echo trans('messages.login-title'); ?></h1>
        <img class="img-welcome" src="media/logo.png" alt="Logo de Astronic">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="user"><h3 class="mt-5 mb-5 welcome-message"><?php echo trans('messages.login-user'); ?></h3>
            </label>
            <br>
            <input type="text" name="user" id="user">
            <br>
            <label for="password"><h3 class="mt-5 mb-5 welcome-message"><?php echo trans('messages.login-password'); ?></h3>
            </label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            <a href="index">
                <input type="submit" value="<?php echo trans('messages.welcome-button')?>" class="btn btn-primary btn-lg rounded mt-5 mb-5"></div>
            </a>
        </form>
    </div>

@endsection
