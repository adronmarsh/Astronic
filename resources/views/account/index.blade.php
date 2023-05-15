@extends('layout')

@section('title', 'Cuenta')

@section('content')
    <div class="row d-flex justify-content-center">
        <div>
            <img class="avatar rounded-circle img-ms"
                src="{{ $user->avatar != null ? $user->avatar : asset('media/default-avatar.png') }}"
                alt="Foto de perfil de {{ $user->user }}">
            <h1>{{ $user->user }}</h1>
            <a href="{{ route('account.edit', $user->id) }}" class="btn btn-primary">Editar perfil</a>
            <p>Posts: {{ $user->posts->count() }}</p>
            {{ $user->bio }}
        </div>
        @foreach ($posts as $post)
            <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
            {{-- <div class="col-md-4 mb-4 p-4">
                <div class="card">
                    <div class="card-body">
                        <img class="avatar rounded-circle img-ms"
                            src="{{ $post->user->avatar != null ? $post->user->avatar : asset('media/default-avatar.png') }}"
                            alt="Foto de perfil de {{ $post->user->user }}">
                        {{ $post->user->user }}
                        <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
                        <button class="btn btn-link like-btn{{ $liked ? ' liked' : '' }}"
                            data-post-id="{{ $post->id }}">
                            <i class="fa fa-heart {{ $liked ? 'text-danger' : 'text-dark' }}"></i>
                        </button>
                        <span class="like-count" data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</span>
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
            </div> --}}
            @include('partials.post', ['post' => $post])
        @endforeach
    </div>

@endsection
