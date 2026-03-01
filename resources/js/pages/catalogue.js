// Toggle collapsible filter groups
function toggleGrp(el) {
    const grp = el.closest(".filter-grp");
    const body = grp.querySelector(".filter-grp-body");
    grp.classList.toggle("is-open");
    body.style.display = grp.classList.contains("is-open") ? "flex" : "none";
}

// Switch between grid / list view
function setView(mode) {
    const grid = document.getElementById("catGrid");
    const gridBtn = document.getElementById("gridViewBtn");
    const listBtn = document.getElementById("listViewBtn");
    if (mode === "list") {
        grid.classList.add("list-view");
        listBtn.classList.add("active");
        gridBtn.classList.remove("active");
    } else {
        grid.classList.remove("list-view");
        gridBtn.classList.add("active");
        listBtn.classList.remove("active");
    }
}

// Sort pill toggle
document.querySelectorAll(".f-sort-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.closest(".f-sort-grid")
            .querySelectorAll(".f-sort-btn")
            .forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");
    });
});

// Reset all filters
document.getElementById("resetFilters").addEventListener("click", () => {
    document.querySelectorAll(".cat-sidebar input").forEach((inp) => {
        if (inp.type === "checkbox") inp.checked = false;
        if (inp.type === "range") inp.dispatchEvent(new Event("input"));
    });
    document.getElementById("activeChips").innerHTML = "";
    document
        .querySelectorAll(".f-sort-btn")
        .forEach((b, i) => b.classList.toggle("active", i === 0));
});

// Live search (client-side demo)
document
    .getElementById("catalogueSearch")
    .addEventListener("input", function () {
        const q = this.value.toLowerCase();
        document.querySelectorAll(".cat-card").forEach((card) => {
            const title = card
                .querySelector(".cat-card-title")
                .textContent.toLowerCase();
            card.style.opacity = !q || title.includes(q) ? "1" : "0.2";
            card.style.pointerEvents = !q || title.includes(q) ? "" : "none";
        });
    });

// Chip dismiss
document.getElementById("activeChips").addEventListener("click", (e) => {
    const chip = e.target.closest(".active-chip");
    if (chip) chip.remove();
});
