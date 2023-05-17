function toggleComments(postId) {
    var commentsDiv = document.getElementById('comments-' + postId);
    if (commentsDiv.style.display === 'none') {
        commentsDiv.style.display = 'block';
    } else {
        commentsDiv.style.display = 'none';
    }
}

function submitComment(postId) {
    var form = $('#commentForm-' + postId);
    var formData = form.serialize();

    var token = $('meta[name="csrf-token"]').attr('content');
    formData += '&_token=' + encodeURIComponent(token);

    $.ajax({
        type: 'POST',
        url: '/comments',
        data: formData,
        success: function (response) {
            var commentsSection = $('#comments-' + postId).find('.card-body:last');
            commentsSection.append(response.commentHtml);
            form.trigger('reset');

        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });


}

function showEditForm(commentId) {
    document.getElementById(`comment-${commentId}-content`).style.display = 'none';
    document.getElementById(`comment-${commentId}-edit-form`).style.display = 'block';
}

function toggleOptions(commentId) {
    var optionsDiv = document.getElementById("comment-" + commentId + "-options");
    if (optionsDiv.style.display === "none") {
        optionsDiv.style.display = "block";
    } else {
        optionsDiv.style.display = "none";
    }
}
