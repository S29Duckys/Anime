// ── Cursor ──
const cursor = document.getElementById("cursor");
const ring = document.getElementById("cursorRing");
let mx = 0,
    my = 0,
    rx = 0,
    ry = 0;

document.addEventListener("mousemove", (e) => {
    mx = e.clientX;
    my = e.clientY;
    cursor.style.left = mx + "px";
    cursor.style.top = my + "px";
});

function animRing() {
    rx += (mx - rx) * 0.12;
    ry += (my - ry) * 0.12;
    ring.style.left = rx + "px";
    ring.style.top = ry + "px";
    requestAnimationFrame(animRing);
}
animRing();

document.querySelectorAll("a, button, input, label").forEach((el) => {
    el.addEventListener("mouseenter", () => {
        cursor.style.transform = "translate(-50%,-50%) scale(2.2)";
        ring.style.width = "50px";
        ring.style.height = "50px";
    });
    el.addEventListener("mouseleave", () => {
        cursor.style.transform = "translate(-50%,-50%) scale(1)";
        ring.style.width = "36px";
        ring.style.height = "36px";
    });
});

// ── Toggle password ──
const pwInput = document.getElementById("password");
document.getElementById("eyeBtn").addEventListener("click", () => {
    const show = pwInput.type === "password";
    pwInput.type = show ? "text" : "password";
    document.getElementById("eyeIcon").style.opacity = show ? "0.35" : "1";
});
