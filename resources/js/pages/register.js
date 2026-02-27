/* EYE TOGGLES */
function makeEye(inp, btn, ico) {
    document.getElementById(btn).addEventListener("click", () => {
        const el = document.getElementById(inp),
            show = el.type === "password";
        el.type = show ? "text" : "password";
        document.getElementById(ico).style.opacity = show ? "0.3" : "1";
    });
}
makeEye("password", "eye1", "eyeIco1");
makeEye("confirm", "eye2", "eyeIco2");

/* PASSWORD STRENGTH */
const lvls = [
    {
        color: "#e63946",
        text: "Très faible",
        w: "18%",
    },
    {
        color: "#f97316",
        text: "Faible",
        w: "36%",
    },
    {
        color: "#eab308",
        text: "Moyen",
        w: "56%",
    },
    {
        color: "#22c55e",
        text: "Fort",
        w: "78%",
    },
    {
        color: "#10b981",
        text: "Très fort",
        w: "100%",
    },
];
document.getElementById("password").addEventListener("input", function () {
    const v = this.value,
        bar = document.getElementById("strength");
    if (!v) {
        bar.classList.remove("visible");
        return;
    }
    bar.classList.add("visible");
    let s = 0;
    if (v.length >= 8) s++;
    if (v.length >= 12) s++;
    if (/[A-Z]/.test(v)) s++;
    if (/[0-9]/.test(v)) s++;
    if (/[^A-Za-z0-9]/.test(v)) s++;
    s = Math.min(s, 4);
    document.getElementById("sFill").style.width = lvls[s].w;
    document.getElementById("sFill").style.background = lvls[s].color;
    document.getElementById("sLabel").textContent = lvls[s].text;
    document.getElementById("sLabel").style.color = lvls[s].color;
});

/* STEP LOGIC */
const stepMeta = [
    {
        label: "Informations",
        tag: "Étape 1 sur 2",
        title: "Tes infos",
        prog: 50,
    },
    {
        label: "Sécurité",
        tag: "Étape 2 sur 2",
        title: "Sécurité",
        prog: 100,
    },
];

function setErr(id, show) {
    document.getElementById(id)?.classList.toggle("has-error", show);
}

function validateStep(n) {
    let ok = true;

    if (n === 1) {
        const p = document.getElementById("prenom").value.trim();
        const nm = document.getElementById("nom").value.trim();
        const ps = document.getElementById("pseudo").value.trim();
        const em = document.getElementById("email").value.trim();

        setErr("f-prenom", !p);
        if (!p) ok = false;
        setErr("f-nom", !nm);
        if (!nm) ok = false;
        setErr("f-pseudo", !ps);
        if (!ps) ok = false;

        const ev = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em);
        setErr("f-email", !ev);
        if (!ev) ok = false;
    }

    if (n === 2) {
        const pw = document.getElementById("password").value;
        const cf = document.getElementById("confirm").value;

        setErr("f-password", pw.length < 8);
        if (pw.length < 8) ok = false;

        const cm = pw === cf && cf !== "";
        setErr("f-confirm", !cm);
        if (!cm) ok = false;
    }

    return ok;
}

function updateUI(step) {
    document
        .querySelectorAll(".step-panel")
        .forEach((p, i) => p.classList.toggle("active", i === step - 1));
    document.querySelectorAll("#leftSteps .step-item").forEach((el, i) => {
        el.classList.remove("active", "done");
        if (i + 1 === step) el.classList.add("active");
        if (i + 1 < step) el.classList.add("done");
    });
    const m = stepMeta[step - 1];
    document.getElementById("progressFill").style.width = m.prog + "%";
    document.getElementById("progressLabel").textContent = m.label;
    document.getElementById("progressCurrent").textContent = step;
    document.getElementById("formTag").textContent = m.tag;
    document.getElementById("formTitle").textContent = m.title;
}

window.nextStep = function (current) {
    if (!validateStep(current)) return;
    updateUI(current + 1);
};

window.prevStep = function (current) {
    updateUI(current - 1);
};

window.submitForm = function () {
    if (!validateStep(2)) return;

    const pseudo = document.getElementById("pseudo").value || "SENPAI";

    document.getElementById("successPseudo").textContent = pseudo.toUpperCase();

    // Masquer formulaire
    document.getElementById("step2").style.display = "none";
    document.querySelector(".progress-wrap").style.display = "none";
    document.querySelector(".form-heading").style.display = "none";
    document.querySelector(".divider").style.display = "none";

    // Afficher succès
    document.getElementById("successScreen").classList.add("active");
};
