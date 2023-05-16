document.addEventListener('DOMContentLoaded', function () {
    const contentInput = document.getElementById('content');
    const form = document.getElementById('message-form');

    contentInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            form.submit();
        }
    });
});
