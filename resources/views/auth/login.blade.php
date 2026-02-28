<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion — TryAnime</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
    @vite(['resources/css/pages/login.css','resources/js/pages/login.js','resources/js/components/cursorAnimation.js'])
</head>
<body>

    <div class="cursor" id="cursor"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <nav>
        <a href="{{ url('/') }}" class="logo">Try<span>Anime</span></a>
        <div class="nav-actions">
            @auth
                <div class="btn-me-wrapper">
                    <div class="btn-me">
                        <div class="btn-me-avatar">{{ strtoupper(substr(auth()->user()->pseudo, 0, 1)) }}</div>
                        <span class="btn-me-pseudo">{{ auth()->user()->pseudo }}</span>
                        <svg class="btn-me-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <div class="btn-me-dropdown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-me-logout">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ url('/register') }}" class="btn btn-primary">S'inscrire</a>
            @endauth
        </div>
    </nav>

    <div class="login-page">

        <!-- LEFT — Visual -->
        <div class="login-visual">
            <div class="login-visual-bg"></div>
            <div class="login-visual-grid"></div>

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

        <!-- RIGHT — Form -->
        <form class="login-form-side" id="loginForm" action="{{ url('login') }}" method="POST">
            @csrf

            <div class="form-heading fade-1">
                <div class="form-tag">Espace membre</div>
                <h1 class="form-title">Connexion</h1>
                <p class="form-subtitle">
                    Pas encore de compte ? <a href="{{ url('/register') }}">S'inscrire gratuitement</a>
                </p>
            </div>

            <div class="divider fade-2"></div>

            @if ($errors->any())
                <div class="alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form">

                <div class="field fade-3" id="field-email">
                    <label for="email">Adresse e-mail</label>
                    <div class="input-wrap">
                        <input type="email" name="email" id="email" placeholder="ichigo@tryanime.tv" autocomplete="email" />
                        <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="error-msg">Adresse e-mail invalide</span>
                </div>

                <div class="field fade-3" id="field-password">
                    <label for="password">Mot de passe</label>
                    <div class="input-wrap">
                        <input type="password" name="password" id="password" placeholder="••••••••" autocomplete="current-password" />
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

                <div class="form-extras fade-4">
                    <label class="check-label">
                        <input type="checkbox" name="remember" id="remember" />
                        <div class="check-box">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="check-text">Se souvenir de moi</span>
                    </label>
                    <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="btn-submit fade-5">Se connecter</button>

                <div class="or-separator fade-5">
                    <span></span>
                    <p>ou</p>
                    <span></span>
                </div>

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

            </div>

        </form>

    </div>

</body>
</html>
