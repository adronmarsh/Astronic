@extends('layout')

@section('title', 'Error')

@section('content')
    <div class="errors">
        <h2>Error 408: Tiempo de espera agotado</h2>
        <p>Lo sentimos, el servidor ha agotado el tiempo de espera para procesar tu solicitud. Por favor, verifica tu
            conexión a internet y vuelve a intentarlo.</p>
    </div>

@endsection
