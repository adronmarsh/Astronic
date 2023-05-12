$(document).on('click', '.like-btn', function (event) {
    event.preventDefault();

    let id = $(this).data('post-id');

    $.ajax({
        type: 'POST',
        url: '/posts/' + id + '/like',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            post_id: id
        },
        success: function (response) {
            let likesCount = response.likes_count;
            let likeBtn = $('.like-btn[data-post-id="' + id + '"]');
            let likeCountSpan = $('.like-count');

            if (likeBtn.find('i').hasClass('text-dark')) {
                likeBtn.find('i').removeClass('text-dark').addClass('text-danger');
                likesCount++;
            } else {
                likeBtn.find('i').removeClass('text-danger').addClass('text-dark');
                likesCount--;
            }

            likeCountSpan.text(likesCount);

        }
    });
});
