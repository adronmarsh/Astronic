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
                <p class="text-start">
                    <strong>{{ $comment->user->user }}</strong>
                    <span id="comment-{{ $comment->id }}-content">{{ $comment->content }}</span>
                </p>
                <div id="comment-{{ $comment->id }}-edit-form" style="display: none;">
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="content" rows="3">{{ $comment->content }}</textarea>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link btn-sm text-danger">Eliminar</button>
                </form>
                <button class="btn btn-link btn-sm" onclick="showEditForm({{ $comment->id }})">Editar</button>
            </div>
        @endforeach
    </div>


</div>
