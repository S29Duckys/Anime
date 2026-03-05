function tick() {
    const el = document.getElementById("adminClock");
    if (el) {
        const now = new Date();
        el.textContent = now.toTimeString().slice(0, 8);
    }
}
tick();
setInterval(tick, 1000);

// Filter buttons
document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        document
            .querySelectorAll(".filter-btn")
            .forEach((b) => b.classList.remove("active"));
        this.classList.add("active");
        const filter = this.dataset.filter;
        document.querySelectorAll("#usersTable tbody tr").forEach((row) => {
            if (filter === "all") {
                row.style.display = "";
            } else {
                row.style.display = row.dataset.status === filter ? "" : "none";
            }
        });
    });
});

// Search
document.getElementById("userSearch")?.addEventListener("input", function () {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll("#usersTable tbody tr").forEach((row) => {
        const name = row.dataset.name || "";
        const email = row.dataset.email || "";
        row.style.display =
            !q || name.includes(q) || email.includes(q) ? "" : "none";
    });
});

// Select all
document.getElementById("selectAll")?.addEventListener("change", function () {
    document
        .querySelectorAll(".row-check")
        .forEach((cb) => (cb.checked = this.checked));
});
