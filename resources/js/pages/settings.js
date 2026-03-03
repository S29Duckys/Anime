const navItems = document.querySelectorAll(".settings-nav__item[data-panel]");
const panels = document.querySelectorAll(".settings-panel");

navItems.forEach((item) => {
    item.addEventListener("click", (e) => {
        e.preventDefault();
        const target = item.dataset.panel;
        navItems.forEach((n) => n.classList.remove("active"));
        panels.forEach((p) => p.classList.remove("active"));
        item.classList.add("active");
        document.getElementById("panel-" + target)?.classList.add("active");
        history.replaceState(null, "", "#" + target);
    });
});

const hash = location.hash.replace("#", "");
if (hash) document.querySelector('[data-panel="' + hash + '"]')?.click();

document.querySelectorAll(".s-input-eye").forEach((btn) => {
    btn.addEventListener("click", () => {
        const input = document.getElementById(btn.dataset.target);
        if (input) input.type = input.type === "password" ? "text" : "password";
    });
});

const pwInput = document.getElementById("new_password");
if (pwInput) {
    pwInput.addEventListener("input", () => {
        const v = pwInput.value;
        let score = 0;
        if (v.length >= 8) score++;
        if (/[A-Z]/.test(v)) score++;
        if (/[0-9]/.test(v)) score++;
        if (/[^A-Za-z0-9]/.test(v)) score++;
        const tier = score <= 1 ? "weak" : score <= 2 ? "medium" : "strong";
        [1, 2, 3, 4].forEach((i) => {
            const bar = document.getElementById("str" + i);
            bar.className = "s-strength__bar";
            if (i <= score) bar.classList.add(tier);
        });
    });
}

const pwConfirm = document.getElementById("new_password_confirmation");
const pwMatch = document.getElementById("pw-match");
if (pwConfirm && pwInput && pwMatch) {
    const check = () => {
        if (!pwConfirm.value) {
            pwMatch.textContent = "";
            return;
        }
        const ok = pwInput.value === pwConfirm.value;
        pwMatch.textContent = ok
            ? "Les mots de passe correspondent"
            : "Ne correspondent pas";
        pwMatch.className = "s-hint " + (ok ? "s-hint--ok" : "s-hint--error");
    };
    pwConfirm.addEventListener("input", check);
    pwInput.addEventListener("input", check);
}

const bio = document.getElementById("bio");
const bioCount = document.getElementById("bio-count");
if (bio && bioCount) {
    const update = () => {
        bioCount.textContent = bio.value.length + " / 200 caracteres";
    };
    bio.addEventListener("input", update);
    update();
}

document.querySelectorAll("[data-modal]").forEach((btn) => {
    btn.addEventListener("click", () =>
        document.getElementById(btn.dataset.modal)?.classList.add("open"),
    );
});
document.querySelectorAll("[data-close-modal]").forEach((btn) => {
    btn.addEventListener("click", () =>
        btn.closest(".s-modal-overlay")?.classList.remove("open"),
    );
});
document.querySelectorAll(".s-modal-overlay").forEach((overlay) => {
    overlay.addEventListener("click", (e) => {
        if (e.target === overlay) overlay.classList.remove("open");
    });
});
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape")
        document
            .querySelectorAll(".s-modal-overlay.open")
            .forEach((o) => o.classList.remove("open"));
});

const confirmInput = document.getElementById("confirm-pseudo");
const confirmBtn = document.getElementById("btn-confirm-delete");
if (confirmInput && confirmBtn) {
    confirmInput.addEventListener("input", () => {
        confirmBtn.disabled = confirmInput.value.trim() !== "ShinobiX";
    });
}
