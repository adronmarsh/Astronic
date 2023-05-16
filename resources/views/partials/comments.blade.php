<div class="comments" id="comments-{{ $post->id }}" style="display:none">
    <div class="card-body">
        <form id="commentForm-{{ $post->id }}" data-post-id="{{ $post->id }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <textarea name="content" class="form-control" placeholder="Escribe tu comentario" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-primary mt-3"
                onclick="submitComment({{ $post->id }})">Comentar</button>
        </form>
    </div>

    <div class="card-body">
        <h4>Comentarios</h4>
        @foreach ($post->comments as $comment)
            <div class="mb-3">
                <p><strong>{{ $comment->user->user }}</strong> {{ $comment->content }}</p>
            </div>
        @endforeach
    </div>

</div>
