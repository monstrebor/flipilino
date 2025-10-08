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

document.addEventListener('DOMContentLoaded', function () {
    const commentBoxes = document.querySelectorAll('.comment-box');

    commentBoxes.forEach(box => {
        const postId = box.id.replace('comments-', '');
        const toggleBtn = document.querySelector(`[data-toggle-comments="${postId}"]`);

        // Reopen if saved in localStorage
        if (localStorage.getItem('commentsOpen') === postId) {
            box.style.display = 'block';
        }

        // Open box when user clicks the button
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                box.style.display = 'block';
                localStorage.setItem('commentsOpen', postId);
            });
        }
    });

    // Close when clicking outside
    document.addEventListener('click', function (event) {
        const openBoxId = localStorage.getItem('commentsOpen');
        if (!openBoxId) return;

        const openBox = document.getElementById(`comments-${openBoxId}`);
        const toggleBtn = document.querySelector(`[data-toggle-comments="${openBoxId}"]`);

        if (openBox && !openBox.contains(event.target) && (!toggleBtn || !toggleBtn.contains(event.target))) {
            openBox.style.display = 'none';
            localStorage.removeItem('commentsOpen');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Restore previous scroll position if stored
    const savedScroll = localStorage.getItem('scrollPosition');
    if (savedScroll) {
        window.scrollTo(0, parseInt(savedScroll));
        localStorage.removeItem('scrollPosition');
    }

    // Before form submission, store the current scroll position
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function () {
            localStorage.setItem('scrollPosition', window.scrollY);
        });
    });
});
