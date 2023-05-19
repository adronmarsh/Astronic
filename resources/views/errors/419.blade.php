@extends('layout')

@section('title', 'Error')

@section('content')
    <div class="errors">
        <h2>Error 419: Tiempo de autenticación expirado</h2>
        <p>Lo sentimos, tu sesión de autenticación ha caducado. Por razones de seguridad, debes iniciar sesión nuevamente
            para continuar.</p>
        <p>Por favor, haz clic en el enlace de inicio de sesión a continuación:</p>
        <a href="/login">Iniciar sesión</a>

    </div>

@endsection
