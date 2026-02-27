<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion — TryAnime</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    /* =============================================
       VARIABLES & RESET (from anime.css)
       ============================================= */
    :root {
      --bg: #080810;
      --surface: #0f0f1a;
      --card: #13131f;
      --border: rgba(255, 255, 255, 0.06);
      --accent: #e63946;
      --accent2: #ff6b35;
      --gold: #f4c430;
      --text: #e8e8f0;
      --muted: #6b6b80;
      --glow: rgba(230, 57, 70, 0.4);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
      min-height: 100vh;
      cursor: none;
    }

    /* Noise overlay */
    body::after {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
      opacity: 0.03;
      pointer-events: none;
      z-index: 9997;
    }

    /* =============================================
       CURSOR
       ============================================= */
    .cursor {
      position: fixed;
      width: 10px; height: 10px;
      background: var(--accent);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform 0.1s, width 0.2s, height 0.2s;
      mix-blend-mode: difference;
    }
    .cursor-ring {
      position: fixed;
      width: 36px; height: 36px;
      border: 1.5px solid var(--accent);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: transform 0.15s ease, width 0.2s, height 0.2s;
      opacity: 0.5;
    }

    /* =============================================
       NAVBAR
       ============================================= */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      padding: 20px 48px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: linear-gradient(to bottom, rgba(8, 8, 16, 0.95), transparent);
      backdrop-filter: blur(2px);
    }

    .logo {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      letter-spacing: 0.1em;
      color: var(--text);
      text-decoration: none;
    }
    .logo span { color: var(--accent); }

    .nav-links {
      display: flex;
      gap: 36px;
      list-style: none;
    }
    .nav-links a {
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }
    .nav-links a:hover { color: var(--text); }

    .nav-actions { display: flex; gap: 14px; align-items: center; }

    /* =============================================
       BUTTONS (from anime.css)
       ============================================= */
    .btn {
      font-size: 0.78rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 10px 22px;
      border-radius: 2px;
      cursor: none;
      transition: all 0.2s;
      text-decoration: none;
      border: none;
    }
    .btn-ghost {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--muted);
    }
    .btn-ghost:hover {
      border-color: rgba(255, 255, 255, 0.2);
      color: var(--text);
    }
    .btn-primary {
      background: var(--accent);
      border: 1px solid var(--accent);
      color: #fff;
      box-shadow: 0 0 20px var(--glow);
    }
    .btn-primary:hover {
      background: #ff4757;
      box-shadow: 0 0 30px var(--glow);
      transform: translateY(-1px);
    }

    /* =============================================
       PAGE LAYOUT
       ============================================= */
    .login-page {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    /* =============================================
       LEFT — Visual Panel
       ============================================= */
    .login-visual {
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 48px;
    }

    /* Background layers */
    .login-visual-bg {
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 70% 80% at 40% 30%, rgba(230, 57, 70, 0.18) 0%, transparent 65%),
        radial-gradient(ellipse 50% 60% at 80% 70%, rgba(255, 107, 53, 0.08) 0%, transparent 55%),
        linear-gradient(180deg, #0d0d1a 0%, #080810 100%);
    }

    /* Grid lines from hero */
    .login-visual-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
      background-size: 60px 60px;
      mask-image: linear-gradient(180deg, transparent, rgba(0,0,0,0.5) 40%, rgba(0,0,0,0.2) 100%);
    }

    /* Floating anime cards */
    .visual-cards {
      position: absolute;
      inset: 0;
      pointer-events: none;
    }

    .float-card {
      position: absolute;
      border-radius: 6px;
      overflow: hidden;
      box-shadow: 0 30px 80px rgba(0,0,0,0.8), 0 0 0 1px var(--border);
    }
    .float-card img {
      width: 100%; height: 100%;
      object-fit: cover;
      display: block;
      filter: saturate(0.7);
    }

    /* Each card uses a solid color placeholder since no real images */
    .vc1 {
      width: 110px; height: 160px;
      top: 14%; left: 8%;
      animation: float 7s ease-in-out infinite;
      animation-delay: 0s;
    }
    .vc2 {
      width: 90px; height: 130px;
      top: 8%; left: 38%;
      animation: float 6s ease-in-out infinite;
      animation-delay: -2s;
    }
    .vc3 {
      width: 120px; height: 175px;
      top: 38%; left: 18%;
      animation: float 8s ease-in-out infinite;
      animation-delay: -4s;
    }
    .vc4 {
      width: 95px; height: 140px;
      top: 30%; left: 55%;
      animation: float 5s ease-in-out infinite;
      animation-delay: -1s;
    }
    .vc5 {
      width: 105px; height: 155px;
      top: 58%; left: 42%;
      animation: float 9s ease-in-out infinite;
      animation-delay: -3s;
    }

    .card-img-placeholder {
      width: 100%; height: 100%;
      display: flex; align-items: flex-end;
      padding: 10px 8px;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 0.65rem;
      letter-spacing: 0.08em;
      color: rgba(255,255,255,0.7);
    }

    .vc1 .card-img-placeholder { background: linear-gradient(160deg, #1a0a14, #2e1020); }
    .vc2 .card-img-placeholder { background: linear-gradient(160deg, #0a1020, #111830); }
    .vc3 .card-img-placeholder { background: linear-gradient(160deg, #0f1a0a, #1a2e10); }
    .vc4 .card-img-placeholder { background: linear-gradient(160deg, #1a150a, #2e2410); }
    .vc5 .card-img-placeholder { background: linear-gradient(160deg, #0a0f1a, #10182e); }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-16px); }
    }

    /* Gradient fade over cards */
    .login-visual::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to right,
        transparent 0%,
        rgba(8, 8, 16, 0.4) 100%
      ),
      linear-gradient(
        to top,
        rgba(8, 8, 16, 0.9) 0%,
        transparent 50%
      );
      z-index: 1;
    }

    /* Visual bottom content */
    .visual-content {
      position: relative;
      z-index: 2;
    }

    .visual-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 16px;
      padding: 6px 12px;
      border: 1px solid rgba(230, 57, 70, 0.3);
      border-radius: 2px;
      background: rgba(230, 57, 70, 0.05);
    }
    .visual-badge::before {
      content: '';
      width: 6px; height: 6px;
      background: var(--accent);
      border-radius: 50%;
      animation: pulse 2s infinite;
    }

    .visual-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(2.8rem, 5vw, 4.5rem);
      line-height: 0.92;
      letter-spacing: 0.02em;
      margin-bottom: 16px;
    }
    .visual-title .stroke {
      -webkit-text-stroke: 1px rgba(255,255,255,0.25);
      color: transparent;
    }
    .visual-title .accent { color: var(--accent); }

    .visual-desc {
      font-size: 0.88rem;
      line-height: 1.7;
      color: var(--muted);
      max-width: 380px;
      margin-bottom: 32px;
    }

    .visual-stats {
      display: flex;
      gap: 32px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
    }
    .stat-num {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      color: var(--text);
      line-height: 1;
    }
    .stat-num span { color: var(--accent); }
    .stat-label {
      font-size: 0.7rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin-top: 4px;
    }

    /* =============================================
       RIGHT — Form Panel
       ============================================= */
    .login-form-side {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 100px 64px 64px;
      background: var(--surface);
      border-left: 1px solid var(--border);
      position: relative;
      overflow: hidden;
    }

    /* Subtle top glow */
    .login-form-side::before {
      content: '';
      position: absolute;
      top: -80px; right: -80px;
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(230,57,70,0.06) 0%, transparent 70%);
      pointer-events: none;
    }

    /* ── Form heading ── */
    .form-heading { margin-bottom: 36px; }

    .form-tag {
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 12px;
    }

    .form-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 3rem;
      letter-spacing: 0.04em;
      line-height: 1;
      margin-bottom: 8px;
    }

    .form-subtitle {
      font-size: 0.85rem;
      color: var(--muted);
    }
    .form-subtitle a {
      color: var(--accent);
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s;
    }
    .form-subtitle a:hover { color: #ff4757; }

    /* ── Divider ── */
    .divider {
      height: 1px;
      background: var(--border);
      margin: 28px 0;
    }

    /* ── Form fields ── */
    .form { display: flex; flex-direction: column; gap: 20px; }

    .field { display: flex; flex-direction: column; gap: 6px; }

    label {
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--muted);
    }

    .input-wrap { position: relative; }

    .input-wrap svg.field-icon {
      position: absolute;
      left: 14px; top: 50%;
      transform: translateY(-50%);
      width: 15px; height: 15px;
      color: var(--muted);
      pointer-events: none;
      transition: color 0.2s;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: 100%;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 2px;
      padding: 12px 14px 12px 42px;
      font-family: 'Inter', sans-serif;
      font-size: 0.88rem;
      color: var(--text);
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    input::placeholder { color: #2e2e45; }

    input:focus {
      border-color: rgba(230, 57, 70, 0.5);
      box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.08);
    }
    input:focus ~ svg.field-icon,
    .input-wrap:focus-within svg.field-icon { color: var(--accent); }

    /* Eye toggle */
    .eye-btn {
      position: absolute;
      right: 12px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none;
      cursor: none; color: var(--muted);
      padding: 2px; transition: color 0.2s;
    }
    .eye-btn:hover { color: var(--text); }
    .eye-btn svg { width: 15px; height: 15px; display: block; }

    /* Error */
    .error-msg {
      font-size: 0.72rem;
      color: var(--accent);
      display: none;
      letter-spacing: 0.04em;
    }
    .field.has-error input { border-color: var(--accent); }
    .field.has-error .error-msg { display: block; }

    /* ── Remember / Forgot ── */
    .form-extras {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: -6px;
    }

    .check-label {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: none;
    }
    .check-label input[type="checkbox"] { display: none; }
    .check-box {
      width: 16px; height: 16px;
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 2px;
      background: var(--card);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      transition: background 0.2s, border-color 0.2s;
    }
    .check-box svg { width: 10px; height: 10px; color: #fff; opacity: 0; transition: opacity 0.2s; }
    .check-label input:checked ~ .check-box { background: var(--accent); border-color: var(--accent); }
    .check-label input:checked ~ .check-box svg { opacity: 1; }
    .check-text {
      font-size: 0.78rem;
      color: var(--muted);
    }

    .forgot-link {
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }
    .forgot-link:hover { color: var(--accent); }

    /* ── Submit ── */
    .btn-submit {
      width: 100%;
      padding: 14px;
      background: var(--accent);
      border: 1px solid var(--accent);
      border-radius: 2px;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.1rem;
      letter-spacing: 0.15em;
      color: #fff;
      cursor: none;
      box-shadow: 0 0 20px var(--glow);
      transition: all 0.2s;
      position: relative;
      overflow: hidden;
    }
    .btn-submit::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.12), transparent);
      opacity: 0; transition: opacity 0.2s;
    }
    .btn-submit:hover::after { opacity: 1; }
    .btn-submit:hover {
      background: #ff4757;
      box-shadow: 0 0 36px var(--glow);
      transform: translateY(-1px);
    }
    .btn-submit:active { transform: translateY(0); }

    /* ── OR separator ── */
    .or-separator {
      display: flex; align-items: center; gap: 12px;
    }
    .or-separator span {
      flex: 1; height: 1px;
      background: var(--border);
    }
    .or-separator p {
      font-size: 0.72rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
    }

    /* ── OAuth ── */
    .oauth-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

    .btn-oauth {
      display: flex; align-items: center; justify-content: center; gap: 8px;
      padding: 10px;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 2px;
      font-family: 'Inter', sans-serif;
      font-size: 0.78rem;
      font-weight: 600;
      letter-spacing: 0.06em;
      color: var(--muted);
      cursor: none;
      transition: border-color 0.2s, color 0.2s, background 0.2s;
    }
    .btn-oauth:hover {
      border-color: rgba(255,255,255,0.15);
      color: var(--text);
      background: #1a1a28;
    }
    .btn-oauth svg { width: 17px; height: 17px; flex-shrink: 0; }

    /* =============================================
       ANIMATIONS
       ============================================= */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.4; transform: scale(0.8); }
    }
    @keyframes ripple {
      0% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.5); }
      70% { box-shadow: 0 0 0 20px rgba(230, 57, 70, 0); }
      100% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0); }
    }

    .fade-1 { animation: fadeUp 0.6s ease 0.05s both; }
    .fade-2 { animation: fadeUp 0.6s ease 0.15s both; }
    .fade-3 { animation: fadeUp 0.6s ease 0.25s both; }
    .fade-4 { animation: fadeUp 0.6s ease 0.35s both; }
    .fade-5 { animation: fadeUp 0.6s ease 0.45s both; }
    .fade-6 { animation: fadeUp 0.6s ease 0.55s both; }

    /* =============================================
       SCROLLBAR
       ============================================= */
    ::-webkit-scrollbar { width: 4px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 2px; }

    /* =============================================
       RESPONSIVE
       ============================================= */
    @media (max-width: 900px) {
      .login-page { grid-template-columns: 1fr; }
      .login-visual { display: none; }
      .login-form-side { padding: 100px 32px 48px; border-left: none; }
      nav { padding: 16px 24px; }
      .nav-links { display: none; }
    }
  </style>
</head>
<body>

  <!-- Custom cursor -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Navbar -->
  <nav>
    <a href="{{ url('/') }}" class="logo">Try<span>Anime</span></a>
    <ul class="nav-links">
      <li><a href="#">Catalogue</a></li>
      <li><a href="#">Tendances</a></li>
      <li><a href="#">Genres</a></li>
      <li><a href="#">Communauté</a></li>
    </ul>
    <div class="nav-actions">
      <a href="{{ url('/register') }}" class="btn btn-primary">S'inscrire</a>
    </div>
  </nav>

  <!-- Page -->
  <div class="login-page">

    <!-- ── LEFT : Visual ── -->
    <div class="login-visual">
      <div class="login-visual-bg"></div>
      <div class="login-visual-grid"></div>

      <!-- Floating cards (placeholders — swap src for real posters) -->
      <div class="visual-cards">
        <div class="float-card vc1">
          <div class="card-img-placeholder">DEMON<br>SLAYER</div>
        </div>
        <div class="float-card vc2">
          <div class="card-img-placeholder">JUJUTSU<br>KAISEN</div>
        </div>
        <div class="float-card vc3">
          <div class="card-img-placeholder">AOT</div>
        </div>
        <div class="float-card vc4">
          <div class="card-img-placeholder">ONE<br>PIECE</div>
        </div>
        <div class="float-card vc5">
          <div class="card-img-placeholder">BLEACH</div>
        </div>
      </div>

      <!-- Content -->
      <div class="visual-content">
        <div class="visual-badge">Catalogue en ligne</div>
        <h2 class="visual-title">
          TON UNIVERS<br>
          <span class="stroke">ANIME</span><br>
          <span class="accent">T'ATTEND</span>
        </h2>
        <p class="visual-desc">
          Connecte-toi pour accéder à ta liste, suivre tes séries en cours et découvrir les dernières sorties.
        </p>
        <div class="visual-stats">
          <div>
            <div class="stat-num">12<span>K+</span></div>
            <div class="stat-label">Animes</div>
          </div>
          <div>
            <div class="stat-num">340<span>K</span></div>
            <div class="stat-label">Membres</div>
          </div>
          <div>
            <div class="stat-num">98<span>%</span></div>
            <div class="stat-label">Satisfaction</div>
          </div>
        </div>
      </div>
    </div>

    <!-- ── RIGHT : Form ── -->
    <div class="login-form-side">

      <div class="form-heading fade-1">
        <div class="form-tag">Espace membre</div>
        <h1 class="form-title">Connexion</h1>
        <p class="form-subtitle">
          Pas encore de compte ? <a href="{{ url('/register') }}">S'inscrire gratuitement</a>
        </p>
      </div>

      <div class="divider fade-2"></div>

      <form class="form" id="loginForm" action="{{ url('login') }}" method="POST">
        @csrf

        <!-- Email -->
        <div class="field fade-3" id="field-email">
          <label for="email">Adresse e-mail</label>
          <div class="input-wrap">
            <input type="email" id="email" placeholder="ichigo@tryanime.tv" autocomplete="email" />
            <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <span class="error-msg">Adresse e-mail invalide</span>
        </div>

        <!-- Password -->
        <div class="field fade-3" id="field-password">
          <label for="password">Mot de passe</label>
          <div class="input-wrap">
            <input type="password" id="password" placeholder="••••••••" autocomplete="current-password" />
            <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            <button type="button" class="eye-btn" id="eyeBtn" aria-label="Afficher le mot de passe">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </button>
          </div>
          <span class="error-msg">Mot de passe requis</span>
        </div>

        <!-- Remember / Forgot -->
        <div class="form-extras fade-4">
          <label class="check-label">
            <input type="checkbox" id="remember" />
            <div class="check-box">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
              </svg>
            </div>
            <span class="check-text">Se souvenir de moi</span>
          </label>
          <a href="#" class="forgot-link">Mot de passe oublié ?</a>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-submit fade-5">Se connecter</button>

        <!-- OR -->
        <div class="or-separator fade-5">
          <span></span>
          <p>ou</p>
          <span></span>
        </div>

        <!-- OAuth -->
        <div class="oauth-row fade-6">
          <button type="button" class="btn-oauth">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
              <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
              <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
              <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
            Google
          </button>
          <button type="button" class="btn-oauth">
            <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
            </svg>
            GitHub
          </button>
        </div>

      </form>
    </div>
  </div>

  <script>
    // ── Cursor ──
    const cursor = document.getElementById('cursor');
    const ring   = document.getElementById('cursorRing');
    let mx = 0, my = 0, rx = 0, ry = 0;

    document.addEventListener('mousemove', e => {
      mx = e.clientX; my = e.clientY;
      cursor.style.left = mx + 'px';
      cursor.style.top  = my + 'px';
    });

    function animRing() {
      rx += (mx - rx) * 0.12;
      ry += (my - ry) * 0.12;
      ring.style.left = rx + 'px';
      ring.style.top  = ry + 'px';
      requestAnimationFrame(animRing);
    }
    animRing();

    document.querySelectorAll('a, button, input, label').forEach(el => {
      el.addEventListener('mouseenter', () => {
        cursor.style.transform = 'translate(-50%,-50%) scale(2.2)';
        ring.style.width  = '50px';
        ring.style.height = '50px';
      });
      el.addEventListener('mouseleave', () => {
        cursor.style.transform = 'translate(-50%,-50%) scale(1)';
        ring.style.width  = '36px';
        ring.style.height = '36px';
      });
    });

    // ── Toggle password ──
    const pwInput = document.getElementById('password');
    document.getElementById('eyeBtn').addEventListener('click', () => {
      const show = pwInput.type === 'password';
      pwInput.type = show ? 'text' : 'password';
      document.getElementById('eyeIcon').style.opacity = show ? '0.35' : '1';
    });

  </script>
</body>
</html>


