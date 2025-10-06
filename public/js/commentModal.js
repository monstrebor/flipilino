document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.comment-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const postId = btn.getAttribute('data-post');
            const section = document.querySelector(`#comments-${postId}`);
            section.style.display = (section.style.display === 'none' || section.style.display === '') 
                ? 'block' : 'none';
        });
    });

    document.querySelectorAll('.reply-toggle').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const replyInput = e.target.closest('form').querySelector('.reply-input');
            replyInput.classList.toggle('d-none');
        });
    });

    document.querySelectorAll('.edit-toggle').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const input = e.target.closest('form').querySelector('input[name="content"]');
            input.classList.toggle('d-none');
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.comment-edit-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const form = btn.closest('.d-flex').nextElementSibling;
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });
    });

    document.querySelectorAll('.cancel-edit').forEach(btn => {
        btn.addEventListener('click', e => {
            const form = e.target.closest('.comment-edit-form');
            form.style.display = 'none';
        });
    });
});
