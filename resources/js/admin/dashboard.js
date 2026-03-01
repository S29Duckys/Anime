function updateClock() {
    const now = new Date();
    document.getElementById("adminClock").textContent = now.toLocaleTimeString(
        "fr-FR",
        { hour: "2-digit", minute: "2-digit", second: "2-digit" },
    );
}
updateClock();
setInterval(updateClock, 1000);
