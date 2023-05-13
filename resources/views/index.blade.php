@extends('layout')

@section('title', 'Inicio')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            @foreach ($posts as $post)
                <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
                <div class="col-md-7 mb-4 p-4">
                    <div class="card">
                        <div class="card-body">
                            <h1>{{ $post->user->user }}</h1>
                            <span class="like-count">{{ $post->likes->count() }}</span>
                            <button class="btn btn-link like-btn{{ $liked ? ' liked' : '' }}"
                                data-post-id="{{ $post->id }}">
                                <i class="fa fa-heart {{ $liked ? 'text-danger' : 'text-dark' }}"></i>
                            </button>
                        </div>
                        @if ($post->url)
                            @if (in_array(pathinfo($post->url, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'jfif']))
                                <img class="card-img-top" src="{{ $post->url }}" alt="{{ $post->title }}">
                            @elseif (in_array(pathinfo($post->url, PATHINFO_EXTENSION), ['mp4']))
                                <video class="card-img-top" controls>
                                    <source src="{{ $post->url }}" type="video/mp4">
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
