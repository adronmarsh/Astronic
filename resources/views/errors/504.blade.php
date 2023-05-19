@extends('layout')

@section('title', 'Error')

@section('content')
    <div class="errors">
        <h2>Error 504: Tiempo de espera de la puerta de enlace agotado</h2>
        <p>Lo sentimos, el tiempo de espera para recibir una respuesta de la puerta de enlace ha sido agotado. Por favor,
            verifica tu conexión a internet y vuelve a intentarlo.</p>
    </div>

@endsection
