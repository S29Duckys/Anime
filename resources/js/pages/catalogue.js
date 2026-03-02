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

const searchInput = document.getElementById("catalogueSearch");
const cardGrid = document.getElementById("catGrid");
let debounceTimer;

searchInput.addEventListener("input", function () {
    const query = searchInput.value.trim();

    // Filtrage local rapide
    document.querySelectorAll(".cat-card").forEach((card) => {
        const title = card
            .querySelector(".cat-card-title")
            ?.textContent.toLowerCase();
        const match = !query || (title && title.includes(query.toLowerCase()));
        card.style.opacity = match ? "1" : "0.2";
        card.style.pointerEvents = match ? "" : "none";
    });

    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(async () => {
        try {
            const url =
                query !== ""
                    ? `/search/${encodeURIComponent(query)}`
                    : `/search/all`;
            const res = await fetch(url);
            if (!res.ok)
                throw new Error(`Network response failed: ${res.status}`);

            const data = await res.json();

            // On vide le grid avant d’ajouter les cartes
            cardGrid.innerHTML = "";

            if (data.catalogueAnime && Array.isArray(data.catalogueAnime)) {
                let html = "";
                for (const elem of data.catalogueAnime) {
                    html += `
<div class="cat-card">
  <div class="cat-card-img">
    <img src="${elem.image_url}" alt="${elem.title}">
    <div class="cat-card-badges"><span class="cat-badge cat-badge-new">Nouveau</span></div>
    <div class="cat-card-rating">★ ${elem.rating ?? "N/A"}</div>
    <div class="cat-card-hover">
      <a href="/anime/${elem.slug}" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
    </div>
  </div>
  <div class="cat-card-body">
    <div class="cat-card-genre">${elem.genre}</div>
    <div class="cat-card-title">${elem.title}</div>
    <div class="cat-card-meta">
      <span>${elem.episodes} ép.</span><span class="dot"></span>
      <span>${elem.year}</span><span class="dot"></span>
      <span>${elem.studio}</span>
    </div>
  </div>
</div>`;
                }
                cardGrid.innerHTML = html;
            } else {
                console.warn("Aucun anime trouvé pour cette recherche");
            }
        } catch (err) {
            console.error("Search error:", err);
        }
    }, 400); // debounce 400ms
});

// Chip dismiss
document.getElementById("activeChips").addEventListener("click", (e) => {
    const chip = e.target.closest(".active-chip");
    if (chip) chip.remove();
});
