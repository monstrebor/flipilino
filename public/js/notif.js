    document.addEventListener("DOMContentLoaded", function () {
        // Select all alert elements
        const alerts = document.querySelectorAll(".alert");

        alerts.forEach(alert => {
            // Auto hide after 5 seconds
            setTimeout(() => {
                alert.classList.add("opacity-0", "transition", "duration-500");
                setTimeout(() => alert.remove(), 500); // remove after fade out
            }, 20000);

            // Close button click
            const closeBtn = alert.querySelector(".alert-close");
            if (closeBtn) {
                closeBtn.addEventListener("click", () => {
                    alert.classList.add("opacity-0", "transition", "duration-500");
                    setTimeout(() => alert.remove(), 500);
                });
            }
        });
    });
