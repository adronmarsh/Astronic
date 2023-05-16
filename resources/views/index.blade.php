@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            @foreach ($posts as $post)
                <div class="card col-md-7 mt-5 p-4">
                    @include('partials.posts', ['post' => $post])
                </div>
            @endforeach
            <div class="mt-5"></div>
        </div>
    </div>


@endsection
