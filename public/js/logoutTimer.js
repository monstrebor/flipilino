(function () {
    let logoutTimer;

    function autoLogout() {
        console.log("⏳ Auto logout triggered...");
        fetch(window.logoutUrl, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({})
        })
        .then(response => {
            if (!response.ok) throw new Error("Logout request failed");
            return response.json();
        })
        .then(data => {
            console.log(data.message);
            window.location.href = "/"; 
        })
        .catch(err => {
            console.error("❌ Logout failed:", err);
        });
    }

    function resetTimer() {
        clearTimeout(logoutTimer);
        // ⏳ auto-logout after 30s idle (adjust to minutes/hours as needed)
        logoutTimer = setTimeout(autoLogout, 15 * 60 * 1000); // 15 minutes
        // logoutTimer = setTimeout(autoLogout, 10 * 1000); // 10 seconds
    }

    ["click", "mousemove", "keydown", "scroll", "touchstart"].forEach(event => {
        window.addEventListener(event, resetTimer);
    });

    resetTimer();
})();
