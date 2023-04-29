@extends('layout-login')

@section('title')
    <?php echo trans('messages.welcome-title')?>
@endsection

@section('content')
    <h1 class="mt-5"><?php echo trans('messages.welcome-text'); ?></h1>
    <img class="img-welcome" src="media/logo.png" alt="Logo de Astronic">
    <h3 class="mt-5 mb-5 page-title"><?php echo trans('messages.welcome-info'); ?></h3>
    <a href="register">
        <div class="btn btn-primary btn-lg rounded mt-5 mb-5"><?php echo trans('messages.welcome-button'); ?></div>
    </a>
@endsection
