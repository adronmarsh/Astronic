@extends('layout')

@section('title')
    {{ __('messages.account-title') }}
@endsection

@section('content')
    <div class="row d-flex justify-content-left">
        <div class="mt-5">
            @if (count($user->notices) != 0)
                <a href="{{ route('userNotices', $user->id) }}">
            @endif
            <img class="avatar rounded-circle {{ count($user->notices) != 0 ? 'border border-success border-3' : '' }} img-ms"
                src="{{ $user->avatar ?? asset('media/default-avatar.png') }}" alt="Foto de perfil de {{ $user->user }}">
            @if (count($user->notices) != 0)
                </a>
            @endif
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="p-3">{{ $user->user }}</h1>
                <div>
                    <a href="{{ route('users.edit', $user->id) }}"
                        class="btn btn-primary">{{ __('messages.account-edit') }}</a>
                </div>
                @auth
                    @if (Auth::user()->rol == 'corporation')
                        <div class="p-3">
                            <a href="{{ route('shop', $user->id) }}">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="d-flex justify-content-center">
                <p class="p-3">{{ $user->posts->count() }} {{ __('messages.account-posts') }}</p>
                <p class="p-3">{{ $followers }} {{ __('messages.account-followers') }}</p>
                <p class="p-3">{{ $following }} {{ __('messages.account-following') }}</p>
            </div>
            {{ $user->bio }}
        </div>
        @foreach ($posts as $post)
            <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
            <div class="col-md-4 mb-4 p-4">
                <div class="card">
                    @include('partials.posts', ['post' => $post])
                </div>
            </div>
        @endforeach
    </div>
@endsection
