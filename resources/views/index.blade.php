@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if ($post->url)
                            @if (in_array(pathinfo($post->url, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'jfif']))
                                <img class="card-img-top" src="{{ $post->url }}" alt="{{ $post->title }}">
                            @elseif (in_array(pathinfo($post->url, PATHINFO_EXTENSION), ['mp4']))
                                <video class="card-img-top" controls>
                                    <source src="{{ $post->url }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
