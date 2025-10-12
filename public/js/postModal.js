document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("create-post-form");
    const fileInput = document.getElementById("post-image-upload");
    const previewContainer = document.getElementById("image-preview-container");
    const textarea = document.getElementById("post-text");
    let allFiles = [];

    if (!form || !fileInput || !previewContainer || !textarea) {
        console.error("❌ Missing elements: check IDs.");
        return;
    }

    fileInput.addEventListener("change", (e) => {
        const newFiles = Array.from(e.target.files);
        allFiles = allFiles.concat(newFiles);
        updatePreviews();
    });

    form.addEventListener("submit", () => {
        const dataTransfer = new DataTransfer();
        allFiles.forEach((file) => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    });

    function updatePreviews() {
        previewContainer.innerHTML = "";

        if (allFiles.length === 0) {
            previewContainer.classList.add("d-none");
            textarea.setAttribute("rows", "4");
            return;
        }

        previewContainer.classList.remove("d-none");
        previewContainer.classList.add("d-flex", "flex-wrap", "gap-2");
        textarea.setAttribute("rows", "1");

        allFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const wrapper = document.createElement("div");
                wrapper.className = "position-relative";
                wrapper.style.width = "120px";
                wrapper.style.height = "120px";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "img-thumbnail w-100 h-100";
                img.style.objectFit = "cover";
                img.style.borderRadius = "10px";

                const removeBtn = document.createElement("button");
                removeBtn.type = "button";
                removeBtn.className =
                    "btn btn-sm btn-danger shadow-sm position-absolute top-0 end-0 m-1 text-white";
                removeBtn.innerHTML = `<i class="fas fa-times fa-2xs"></i>`;
                removeBtn.onclick = () => {
                    allFiles.splice(index, 1);
                    updatePreviews();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }
});

