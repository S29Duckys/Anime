// =============================================
//   PAGE ANIME — Interactions
// =============================================

const cursor = document.getElementById("cursor");
const ring   = document.getElementById("cursorRing");

// ─── Agrandissement du curseur sur les éléments interactifs ─────────────────
document.querySelectorAll("a, button, .season-summary, .episode-card").forEach((el) => {
    el.addEventListener("mouseenter", () => {
        cursor.style.transform = "translate(-50%,-50%) scale(2.2)";
        ring.style.width  = "50px";
        ring.style.height = "50px";
    });
    el.addEventListener("mouseleave", () => {
        cursor.style.transform = "translate(-50%,-50%) scale(1)";
        ring.style.width  = "36px";
        ring.style.height = "36px";
    });
});

// ─── Accordion saisons : une seule ouverte à la fois ────────────────────────
const seasonBlocks = document.querySelectorAll(".season-block");

seasonBlocks.forEach((details) => {
    details.addEventListener("toggle", () => {
        if (!details.open) return;

        // Ferme toutes les autres saisons
        seasonBlocks.forEach((other) => {
            if (other !== details && other.open) {
                other.open = false;
            }
        });

        // Scroll doux vers la saison ouverte
        setTimeout(() => {
            details.scrollIntoView({ behavior: "smooth", block: "nearest" });
        }, 60);
    });
});

// ─── Épisodes : marquer / démarquer comme "vu" ──────────────────────────────
// Clic gauche = aller vers l'épisode (href)
// Double-clic  = basculer l'état "vu" sans naviguer
document.querySelectorAll(".episode-card").forEach((card) => {
    let clickTimer = null;

    card.addEventListener("click", (e) => {
        // Si double-clic détecté, annuler la navigation
        if (clickTimer) {
            clearTimeout(clickTimer);
            clickTimer = null;
            e.preventDefault();
            card.classList.toggle("ep-watched");
            return;
        }

        // Attendre 220ms pour distinguer simple / double clic
        clickTimer = setTimeout(() => {
            clickTimer = null;
            // Laisse le comportement normal du lien (navigation)
        }, 220);
    });
});

// ─── Boutons Watchlist / Favoris / Vu : toggle état actif ───────────────────
document.querySelectorAll(".btn-action").forEach((btn) => {
    btn.addEventListener("click", () => {
        btn.classList.toggle("is-active");
    });
});
