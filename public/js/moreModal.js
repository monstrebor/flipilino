document.addEventListener("DOMContentLoaded", function () {
    const moreBtn = document.getElementById("openMoreModal");
    const modalElement = document.getElementById("addPostMoreModal");

    if (moreBtn && modalElement) {
        const moreModal = new bootstrap.Modal(modalElement);

        moreBtn.addEventListener("click", function () {
            moreModal.show();
        });
    }
});