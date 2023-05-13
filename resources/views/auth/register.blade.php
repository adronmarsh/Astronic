@extends('layout-login')

@section('title')
    <?php echo trans('messages.register-title'); ?>
@endsection

@section('content')
    <div>
        <h1 class="mt-5"><?php echo trans('messages.register-text'); ?></h1>
        <a href="/">
            <img class="img-welcome" src="media/logo.png" alt="Astronic Logo">
        </a>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="rol">
                <h3 class="mt-5 mb-5 page-title">Tipo de cuenta</h3>
            </label>
            <select id="rol" name="rol">
                <option value="corporation">Empresa</option>
                <option value="particular">Individual</option>
            </select>
            <label for="user">
                <h3 class="mt-5 mb-5 page-title">Usuario</h3>
            </label>
            <input type="text" name="user" id="user">
            <label for="email">
                <h3 class="mt-5 mb-5 page-title">Correo electrónico</h3>
            </label>
            <input type="email" name="email" id="email">
            <label for="password">
                <h3 class="mt-5 mb-5 page-title">Contraseña</h3>
            </label>
            <input type="password" name="password" id="password">
            <label for="password_confirmation">
                <h3 class="mt-5 mb-5 page-title">Confirmar contraseña</h3>
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            <a href="index">
                <input type="submit" value="Registrarse" class="btn btn-primary btn-lg rounded mt-5 mb-5">
            </a>
            <a href="login">Ya tienes una cuenta? Iniciar sesión</a>
    </div>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </div>

@endsection
