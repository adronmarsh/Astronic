@extends('layout-login')

@section('title')
    <?php echo trans('messages.login-title'); ?>
@endsection

@section('content')
    <div>
        <h1 class="mt-5"><?php echo trans('messages.login-title'); ?></h1>
        <img class="img-welcome" src="media/logo.png" alt="Astronic Logo">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="user">
                <h3 class="mt-5 mb-5 page-title"><?php echo trans('messages.login-text')?></h3>
            </label>
            <br>
            <input type="text" name="user" id="user">
            <br>
            <label for="password">
                <h3 class="mt-5 mb-5 page-title"><?php echo trans('messages.login-password')?></h3>
            </label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            <a href="index">
                <input type="submit" value="<?php echo trans('messages.welcome-button')?>" class="btn btn-primary btn-lg rounded mt-5 mb-5">
            </a>
        </form>
    </div>
    @isset($error)
        {{ $error }}
    @endisset
    </div>
@endsection
