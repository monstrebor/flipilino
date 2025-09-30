(function () {
    let logoutTimer;

    function autoLogout() {
        console.log("⏳ Auto logout triggered...");
        fetch("{{ route('auto.logout') }}", {
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
            window.location.href = "/"; // send back to login page
        })
        .catch(err => {
            console.error("❌ Logout failed:", err);
        });
    }

    function resetTimer() {
        clearTimeout(logoutTimer);
        logoutTimer = setTimeout(autoLogout, 30 * 1000);
    }

    ["click", "mousemove", "keydown", "scroll", "touchstart"].forEach(event => {
        window.addEventListener(event, resetTimer);
    });

    resetTimer();
})();
