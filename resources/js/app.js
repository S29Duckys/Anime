import "./bootstrap";

document
    .querySelectorAll("a, button, .anime-card, .genre-card, .play-btn")
    .forEach((el) => {
        el.addEventListener("mouseenter", () => {
            cursor.style.width = "18px";
            cursor.style.height = "18px";
            cursorRing.style.width = "54px";
            cursorRing.style.height = "54px";
        });
        el.addEventListener("mouseleave", () => {
            cursor.style.width = "10px";
            cursor.style.height = "10px";
            cursorRing.style.width = "36px";
            cursorRing.style.height = "36px";
        });
    });
