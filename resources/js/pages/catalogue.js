/* catalogue.js — optimisé */

// ── Toggle groupe de filtres ──────────────────────────────────────────────────
function toggleGrp(btn) {
    const grp = btn.closest(".filter-grp");
    const body = grp.querySelector(".filter-grp-body");
    const open = grp.classList.toggle("is-open");

    body.style.display = open ? "flex" : "none";
    btn.setAttribute("aria-expanded", open);
}

// ── Vue grille / liste ────────────────────────────────────────────────────────
function setView(mode) {
    const grid = document.getElementById("catGrid");
    const gridBtn = document.getElementById("gridViewBtn");
    const listBtn = document.getElementById("listViewBtn");
    const isList = mode === "list";

    grid.classList.toggle("list-view", isList);
    gridBtn.classList.toggle("active", !isList);
    listBtn.classList.toggle("active", isList);
    gridBtn.setAttribute("aria-pressed", !isList);
    listBtn.setAttribute("aria-pressed", isList);
}

// ── Tri (pills) ───────────────────────────────────────────────────────────────
document.querySelectorAll(".f-sort-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.closest(".f-sort-grid")
            .querySelectorAll(".f-sort-btn")
            .forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");
    });
});

// ── Réinitialiser les filtres ─────────────────────────────────────────────────
document.getElementById("resetFilters").addEventListener("click", () => {
    // Checkboxes & ranges
    document.querySelectorAll(".cat-sidebar input").forEach((inp) => {
        if (inp.type === "checkbox") inp.checked = false;
        if (inp.type === "range") inp.dispatchEvent(new Event("input"));
    });

    // Chips actives
    document.getElementById("activeChips").innerHTML = "";

    // Tri : réactiver le premier bouton
    const sortBtns = document.querySelectorAll(".f-sort-btn");
    sortBtns.forEach((b, i) => b.classList.toggle("active", i === 0));
});

// ── Dismiss chip ─────────────────────────────────────────────────────────────
document.getElementById("activeChips").addEventListener("click", (e) => {
    e.target.closest(".active-chip")?.remove();
});

// ── Recherche live + debounce ─────────────────────────────────────────────────
const searchInput = document.getElementById("catalogueSearch");
const cardGrid = document.getElementById("catGrid");
let debounce;

/**
 * Construit le HTML d'une carte à partir d'un objet anime (réponse API).
 */
function buildCardHtml(elem) {
    const listButton = window.isAuthenticated
        ? `
            <form method="POST" action="${window.malisteUrl}">
                <input type="hidden" name="_token" value="${window.csrfToken}">
                <input type="hidden" name="info_anime_id" value="${elem.id}">
                <input type="hidden" name="status" value="planned">
                <button type="submit" class="cat-hover-btn cat-hover-list" tabindex="-1">
                    + Ma liste
                </button>
            </form>
          `
        : `
            <a href="${window.loginUrl}" class="cat-hover-btn cat-hover-list" tabindex="-1">
                + Ma liste
            </a>
          `;

    return `
<article class="cat-card">
    <div class="cat-card-img">
        <img src="${elem.image_url}" alt="${elem.title}" loading="lazy" decoding="async">
        <div class="cat-card-badges">
            <span class="cat-badge cat-badge-new">Nouveau</span>
        </div>
        <div class="cat-card-rating">★ ${elem.rating ?? "N/A"}</div>

        <div class="cat-card-hover">
            <a href="/anime/${elem.slug}" class="cat-hover-btn cat-hover-watch">
                ▶ Regarder
            </a>

            ${listButton}
        </div>
    </div>

    <div class="cat-card-body">
        <div class="cat-card-genre">${elem.genre ?? ""}</div>
        <div class="cat-card-title" title="${elem.title}">
            ${elem.title}
        </div>
        <div class="cat-card-meta">
            <span>${elem.episodes ?? "?"} ép.</span>
            <span class="dot"></span>
            <span>${elem.year ?? ""}</span>
            <span class="dot"></span>
            <span>${elem.studio ?? ""}</span>
        </div>
    </div>
</article>`;
}
searchInput.addEventListener("input", function () {
    const query = this.value.trim();

    // Filtrage local immédiat (opacité)
    document.querySelectorAll(".cat-card").forEach((card) => {
        const title =
            card.querySelector(".cat-card-title")?.textContent.toLowerCase() ??
            "";
        const visible = !query || title.includes(query.toLowerCase());
        card.style.opacity = visible ? "1" : "0.2";
        card.style.pointerEvents = visible ? "" : "none";
    });

    // Appel API différé
    clearTimeout(debounce);
    debounce = setTimeout(async () => {
        try {
            const url = query
                ? `/search/${encodeURIComponent(query)}`
                : `/search/all`;

            const res = await fetch(url);
            if (!res.ok) throw new Error(`HTTP ${res.status}`);

            const { catalogueAnime } = await res.json();

            if (!Array.isArray(catalogueAnime)) {
                console.warn("Réponse inattendue :", catalogueAnime);
                return;
            }

            cardGrid.innerHTML = catalogueAnime.length
                ? catalogueAnime.map(buildCardHtml).join("")
                : `<div class="cat-empty">
                       <p>Aucun résultat pour « ${query} ».</p>
                   </div>`;
        } catch (err) {
            console.error("Erreur de recherche :", err);
        }
    }, 400);
});

// ── Raccourci clavier ⌘K / Ctrl+K ────────────────────────────────────────────
document.addEventListener("keydown", (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key === "k") {
        e.preventDefault();
        searchInput.focus();
    }
});
