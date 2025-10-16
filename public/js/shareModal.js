document.addEventListener("DOMContentLoaded", () => {
    const shareButtons = document.querySelectorAll("[data-bs-toggle='modal'][data-bs-target='#shareModal']");
    const shareForm = document.getElementById("shareForm");
    const shareModalElement = document.getElementById("shareModal");
    const shareModal = new bootstrap.Modal(shareModalElement);
    const sharePostPreview = document.getElementById("sharePostPreview");

    shareModalElement.addEventListener("show.bs.modal", event => {
        const button = event.relatedTarget; 
        const postId = button.getAttribute("data-post-id");
        const postCard = button.closest(".card");

        shareForm.action = `/user/posts/${postId}/share`;

        if (postCard) {
            const cloned = postCard.cloneNode(true);
            cloned.querySelectorAll(".post-actions, .engagement-summary").forEach(el => el.remove());

            const cardBody = cloned.querySelector(".card-body");
            sharePostPreview.innerHTML = cardBody ? cardBody.innerHTML : cloned.innerHTML;
        } else {
            sharePostPreview.innerHTML = "<em>Original post will appear here</em>";
        }
    });

    shareModalElement.addEventListener("hidden.bs.modal", () => {
        sharePostPreview.innerHTML = "";
        shareForm.reset();
    });
});
