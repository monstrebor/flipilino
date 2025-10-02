// console.log("✅ postModal.js loaded");  testing
document.addEventListener("DOMContentLoaded", function () {

    const inputFile = document.getElementById('post-image-upload');
    const previewContainer = document.getElementById('image-preview-container');
    const previewImage = document.getElementById('image-preview');
    const removeBtn = document.getElementById('remove-image-btn');
    const textarea = document.querySelector('textarea[name="post_content"]');

    if (!inputFile || !previewContainer || !previewImage || !removeBtn) {
        console.error("One or more preview elements not found!");
        return;
    }

    inputFile.addEventListener('change', function (event) {
        const file = event.target.files[0];
        console.log("📂 File selected:", file);
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('d-none');
                textarea.setAttribute("rows", "1");
            }
            reader.readAsDataURL(file);
        }
    });

    removeBtn.addEventListener('click', function () {
        previewImage.src = '';
        inputFile.value = '';
        previewContainer.classList.add('d-none');
        textarea.setAttribute("rows", "4");
    });
});
