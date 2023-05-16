@extends('layout')

@section('title')
    {{ __('messages.account-title') }}
@endsection

@section('content')
    <div class="row d-flex justify-content-left">
        <div class="mt-5">
            <img class="avatar rounded-circle img-ms"
                src="{{ $user->avatar != null ? $user->avatar : asset('media/default-avatar.png') }}"
                alt="Foto de perfil de {{ $user->user }}">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="p-3">{{ $user->user }}</h1>
                <div>
                    <a href="{{ route('follow', $user->id) }}" class="btn btn-primary">
                        {{ $isFollowing ? __('messages.account-unfollow') : __('messages.account-follow') }}
                    </a>
                </div>


            </div>
            <div class="d-flex justify-content-center">
                <p class="p-3">{{ $user->posts->count() }} {{ __('messages.account-posts') }}</p>
                <p class="p-3">{{$followers}} {{ __('messages.account-followers') }}</p>
                <p class="p-3">{{$following}} {{ __('messages.account-following') }}</p>
            </div>
            {{ $user->bio }}
        </div>
        @foreach ($posts as $post)
            <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
            <div class="col-md-4 mb-4 p-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <a href="/account/{{ $post->user->id }}" class="text-decoration-none text-reset">
                                <img class="avatar rounded-circle img-ms"
                                    src="{{ $post->user->avatar != null ? $post->user->avatar : asset('media/default-avatar.png') }}"
                                    alt="Foto de perfil de {{ $post->user->user }}">
                                {{ $post->user->user }}
                            </a>
                        </div>
                        <div>
                            <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
                            <button class="btn btn-link like-btn{{ $liked ? ' liked' : '' }}"
                                data-post-id="{{ $post->id }}">
                                <i class="fa fa-heart {{ $liked ? 'text-danger' : 'text-dark' }}"></i>
                            </button>
                            <span class="like-count"
                                data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</span>
                        </div>
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
@endsection
