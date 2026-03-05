/* =============================================
   LECTEUR VIDÉO — video.js
   resources/js/pages/video.js
   ============================================= */

document.addEventListener("DOMContentLoaded", () => {
    /* ─── Références DOM ─── */
    const video = document.getElementById("vpVideo");
    const wrap = document.getElementById("vpWrap");
    const controls = document.getElementById("vpControls");
    const spinner = document.getElementById("vpSpinner");
    const centerBtn = document.getElementById("vpCenterBtn");

    const progressInput = document.getElementById("vpProgressInput");
    const fillEl = document.getElementById("vpFill");
    const bufferEl = document.getElementById("vpBuffer");
    const thumbEl = document.getElementById("vpThumb");
    const timeCurrent = document.getElementById("vpTimeCurrent");
    const timeDuration = document.getElementById("vpTimeDuration");

    const btnPlay = document.getElementById("vpBtnPlay");
    const iconPlay = document.getElementById("vpIconPlay");
    const iconPause = document.getElementById("vpIconPause");

    const btnRewind = document.getElementById("vpBtnRewind");
    const btnForward = document.getElementById("vpBtnForward");
    const btnMute = document.getElementById("vpBtnMute");
    const iconVol = document.getElementById("vpIconVol");
    const iconMute = document.getElementById("vpIconMute");
    const volumeInput = document.getElementById("vpVolume");

    const btnSpeed = document.getElementById("vpBtnSpeed");
    const btnPip = document.getElementById("vpBtnPip");
    const btnFull = document.getElementById("vpBtnFull");

    const seasonSelect = document.getElementById("vpSeasonSelect");
    const playlist = document.getElementById("vpPlaylist");

    const { nextUrl, markWatchedUrl, csrfToken } = window.VP_DATA ?? {};

    /* ─────────────────────────────────────────
       UTILITAIRES
    ───────────────────────────────────────── */
    function formatTime(s) {
        if (!s || isNaN(s)) return "0:00";
        const m = Math.floor(s / 60);
        const sec = Math.floor(s % 60);
        return `${m}:${String(sec).padStart(2, "0")}`;
    }

    function setPlayState(playing) {
        iconPlay.style.display = playing ? "none" : "block";
        iconPause.style.display = playing ? "block" : "none";
        wrap.classList.toggle("is-paused", !playing);
    }

    /* ─── Toast ─── */
    let toastTimer;
    const toastEl = (() => {
        const el = document.createElement("div");
        el.className = "vp-toast";
        el.style.cssText = `
            position:fixed; bottom:32px; left:50%;
            transform:translateX(-50%) translateY(12px);
            background:rgba(10,10,20,0.9);
            border:1px solid rgba(255,255,255,0.08);
            backdrop-filter:blur(12px);
            padding:9px 18px; border-radius:3px;
            font-size:0.72rem; letter-spacing:0.08em;
            color:#e8e8f0; z-index:100;
            opacity:0; pointer-events:none;
            transition:opacity .22s, transform .22s;
            font-family:"Inter",sans-serif;
        `;
        document.body.appendChild(el);
        return el;
    })();

    function toast(msg) {
        toastEl.textContent = msg;
        toastEl.style.opacity = "1";
        toastEl.style.transform = "translateX(-50%) translateY(0)";
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            toastEl.style.opacity = "0";
            toastEl.style.transform = "translateX(-50%) translateY(12px)";
        }, 1800);
    }

    /* ─────────────────────────────────────────
       PROGRESSION
    ───────────────────────────────────────── */
    video.addEventListener("timeupdate", () => {
        if (!video.duration) return;
        const pct = (video.currentTime / video.duration) * 100;
        fillEl.style.width = pct + "%";
        thumbEl.style.left = pct + "%";
        progressInput.value = pct;
        timeCurrent.textContent = formatTime(video.currentTime);
    });

    video.addEventListener("loadedmetadata", () => {
        timeDuration.textContent = formatTime(video.duration);
    });

    video.addEventListener("progress", () => {
        if (video.buffered.length > 0 && video.duration) {
            const buf =
                (video.buffered.end(video.buffered.length - 1) /
                    video.duration) *
                100;
            bufferEl.style.width = buf + "%";
        }
    });

    progressInput.addEventListener("input", () => {
        if (video.duration) {
            video.currentTime = (progressInput.value / 100) * video.duration;
        }
    });

    /* ─────────────────────────────────────────
       ÉTATS VIDÉO
    ───────────────────────────────────────── */
    video.addEventListener("waiting", () =>
        spinner.classList.add("is-visible"),
    );
    video.addEventListener("canplay", () =>
        spinner.classList.remove("is-visible"),
    );
    video.addEventListener("playing", () => {
        setPlayState(true);
        spinner.classList.remove("is-visible");
    });
    video.addEventListener("pause", () => setPlayState(false));

    video.addEventListener("ended", () => {
        setPlayState(false);
        markWatched();
        // Auto-lecture épisode suivant après 2s
        if (nextUrl) {
            toast("Passage au prochain épisode…");
            setTimeout(() => {
                window.location.href = nextUrl;
            }, 2000);
        }
    });

    /* ─────────────────────────────────────────
       PLAY / PAUSE
    ───────────────────────────────────────── */
    function togglePlay() {
        if (video.paused) video.play().catch(() => {});
        else video.pause();
    }

    btnPlay.addEventListener("click", togglePlay);
    centerBtn.addEventListener("click", togglePlay);
    wrap.addEventListener("dblclick", (e) => {
        if (!e.target.closest(".vp-controls")) togglePlay();
    });

    // État initial
    setPlayState(false);

    /* ─────────────────────────────────────────
       REWIND / FORWARD
    ───────────────────────────────────────── */
    btnRewind.addEventListener("click", () => {
        video.currentTime = Math.max(0, video.currentTime - 10);
        toast("−10s");
    });
    btnForward.addEventListener("click", () => {
        video.currentTime = Math.min(
            video.duration || 0,
            video.currentTime + 10,
        );
        toast("+10s");
    });

    /* ─────────────────────────────────────────
       VOLUME / MUTE
    ───────────────────────────────────────── */
    function updateVolIcon() {
        const muted = video.muted || video.volume === 0;
        iconVol.style.display = muted ? "none" : "block";
        iconMute.style.display = muted ? "block" : "none";
    }

    btnMute.addEventListener("click", () => {
        video.muted = !video.muted;
        updateVolIcon();
        toast(video.muted ? "Son coupé" : "Son activé");
    });

    volumeInput.addEventListener("input", () => {
        video.volume = volumeInput.value;
        video.muted = volumeInput.value == 0;
        updateVolIcon();
    });

    /* ─────────────────────────────────────────
       VITESSE
    ───────────────────────────────────────── */
    const speeds = [0.5, 0.75, 1, 1.25, 1.5, 2];
    let speedIdx = 2;

    btnSpeed.addEventListener("click", () => {
        speedIdx = (speedIdx + 1) % speeds.length;
        video.playbackRate = speeds[speedIdx];
        btnSpeed.textContent = speeds[speedIdx] + "×";
        toast(`Vitesse ×${speeds[speedIdx]}`);
    });

    /* ─────────────────────────────────────────
       PICTURE-IN-PICTURE
    ───────────────────────────────────────── */
    if (btnPip) {
        btnPip.addEventListener("click", async () => {
            try {
                if (document.pictureInPictureElement) {
                    await document.exitPictureInPicture();
                } else {
                    await video.requestPictureInPicture();
                }
            } catch {
                toast("PiP non supporté");
            }
        });
    }

    /* ─────────────────────────────────────────
       PLEIN ÉCRAN
    ───────────────────────────────────────── */
    btnFull.addEventListener("click", () => {
        if (!document.fullscreenElement) {
            wrap.requestFullscreen().catch(() => {});
        } else {
            document.exitFullscreen();
        }
    });

    document.addEventListener("fullscreenchange", () => {
        const inFs = !!document.fullscreenElement;
        btnFull.classList.toggle("is-active", inFs);
    });

    /* ─────────────────────────────────────────
       RACCOURCIS CLAVIER
    ───────────────────────────────────────── */
    document.addEventListener("keydown", (e) => {
        // Ignore si focus dans un input / select
        if (["INPUT", "SELECT", "TEXTAREA"].includes(e.target.tagName)) return;

        switch (e.key) {
            case " ":
            case "k":
                e.preventDefault();
                togglePlay();
                break;
            case "ArrowLeft":
                e.preventDefault();
                video.currentTime = Math.max(0, video.currentTime - 10);
                toast("−10s");
                break;
            case "ArrowRight":
                e.preventDefault();
                video.currentTime = Math.min(
                    video.duration || 0,
                    video.currentTime + 10,
                );
                toast("+10s");
                break;
            case "ArrowUp":
                e.preventDefault();
                video.volume = Math.min(1, video.volume + 0.1);
                volumeInput.value = video.volume;
                updateVolIcon();
                toast(`Volume ${Math.round(video.volume * 100)}%`);
                break;
            case "ArrowDown":
                e.preventDefault();
                video.volume = Math.max(0, video.volume - 0.1);
                volumeInput.value = video.volume;
                updateVolIcon();
                toast(`Volume ${Math.round(video.volume * 100)}%`);
                break;
            case "f":
            case "F":
                btnFull.click();
                break;
            case "m":
            case "M":
                btnMute.click();
                break;
        }
    });

    /* ─────────────────────────────────────────
       SÉLECTEUR DE SAISON
       Redirige vers la page anime avec l'ancre
       de la saison choisie
    ───────────────────────────────────────── */
    if (seasonSelect) {
        seasonSelect.addEventListener("change", () => {
            const { animeSlug } = window.VP_DATA;
            window.location.href = `/anime/${animeSlug}#${encodeURIComponent(seasonSelect.value)}`;
        });
    }

    /* ─────────────────────────────────────────
       MARQUER COMME VU (AJAX)
    ───────────────────────────────────────── */
    function markWatched() {
        if (!markWatchedUrl || !csrfToken) return;
        const { currentFile, animeSlug, seasonName } = window.VP_DATA;
        fetch(markWatchedUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                anime_slug: animeSlug,
                season_name: seasonName,
                file: currentFile,
            }),
        }).catch(() => {});
    }

    // Marquer vu si on a regardé plus de 85% de l'épisode
    video.addEventListener(
        "timeupdate",
        () => {
            if (!video.duration) return;
            if (video.currentTime / video.duration > 0.85) {
                markWatched();
            }
        },
        { once: false },
    );

    // Dédupliquer l'appel (ne POST qu'une seule fois)
    let watchedSent = false;
    const _origMarkWatched = markWatched;
    // Override pour ne l'envoyer qu'une seule fois
    (function () {
        video.addEventListener("timeupdate", () => {
            if (watchedSent || !video.duration) return;
            if (video.currentTime / video.duration > 0.85) {
                watchedSent = true;
                _origMarkWatched();
            }
        });
    })();

    /* ─────────────────────────────────────────
       SCROLL PLAYLIST VERS L'ITEM ACTIF
    ───────────────────────────────────────── */
    if (playlist) {
        const active = playlist.querySelector(".vp-pl-item.is-active");
        if (active) {
            setTimeout(
                () =>
                    active.scrollIntoView({
                        block: "nearest",
                        behavior: "smooth",
                    }),
                300,
            );
        }
    }
});
