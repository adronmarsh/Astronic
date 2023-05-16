<div class="card-body d-flex justify-content-between">
    <div>
        <a href="/users/{{ $post->user->id }}" class="text-decoration-none text-reset">
            <img class="avatar rounded-circle img-ms"
                src="{{ $post->user->avatar != null ? $post->user->avatar : asset('media/default-avatar.png') }}"
                alt="Foto de perfil de {{ $post->user->user }}">
            {{ $post->user->user }}
        </a>
    </div>
    <div>
        <?php $liked = $post->likes->contains('user_id', auth()->id()); ?>
        <button class="btn btn-link like-btn{{ $liked ? ' liked' : '' }}" data-post-id="{{ $post->id }}">
            <i class="fa fa-heart {{ $liked ? 'text-danger' : 'text-dark' }}"></i>
        </button>
        <span class="like-count" data-post-id="{{ $post->id }}">{{ $post->likes->count() }}</span>
        <button class="btn btn-link" data-post-id="{{ $post->id }}"onclick="toggleComments({{ $post->id }})">
            <i class="fa fa-comment"></i>
        </button>
        <span class="comment-count" data-post-id="{{ $post->id }}">{{ $post->comments->count() }}</span>
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

@include('partials.comments', ['post' => $post])
