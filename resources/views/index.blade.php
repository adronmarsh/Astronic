@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            @foreach ($posts as $post)
                @include('partials.posts', ['post' => $post])
            @endforeach
            <div class="mt-5"></div>
        </div>
    </div>


@endsection
