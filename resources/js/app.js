import "./bootstrap";

// Home Page Cursor Animation

const cursor = document.getElementById("cursor");
const cursorRing = document.getElementById("cursorRing");
let mouseX = 0,
    mouseY = 0;
let ringX = 0,
    ringY = 0;

document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    cursor.style.left = mouseX + "px";
    cursor.style.top = mouseY + "px";
});

function animateRing() {
    ringX += (mouseX - ringX) * 0.12;
    ringY += (mouseY - ringY) * 0.12;
    cursorRing.style.left = ringX + "px";
    cursorRing.style.top = ringY + "px";
    requestAnimationFrame(animateRing);
}
animateRing();

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
