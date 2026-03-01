@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="register-page">

    <!-- LEFT — Visual -->
    <div class="reg-visual">
        <div class="reg-visual-bg"></div>
        <div class="reg-visual-grid"></div>
        <div class="reg-visual-overlay"></div>
        <div class="visual-cards">
            <div class="float-card vc1">
                <div class="card-inner">
                    <div class="card-label">DEMON<br>SLAYER</div>
                    <div class="card-eps">26 ÉP.</div>
                </div>
            </div>
            <div class="float-card vc2">
                <div class="card-inner">
                    <div class="card-label">JJK</div>
                    <div class="card-eps">24 ÉP.</div>
                </div>
            </div>
            <div class="float-card vc3">
                <div class="card-inner">
                    <div class="card-label">ATTACK<br>ON TITAN</div>
                    <div class="card-eps">87 ÉP.</div>
                </div>
            </div>
            <div class="float-card vc4">
                <div class="card-inner">
                    <div class="card-label">ONE<br>PIECE</div>
                    <div class="card-eps">1000+</div>
                </div>
            </div>
            <div class="float-card vc5">
                <div class="card-inner">
                    <div class="card-label">BLEACH</div>
                    <div class="card-eps">366 ÉP.</div>
                </div>
            </div>
            <div class="float-card vc6">
                <div class="card-inner">
                    <div class="card-label">NARUTO</div>
                    <div class="card-eps">720 ÉP.</div>
                </div>
            </div>
        </div>

        <div class="visual-top"></div>

        <div class="visual-bottom">
            <div class="visual-badge">Rejoins la communauté</div>
            <h2 class="visual-title">CRÉE TON<br><span class="stroke">UNIVERS</span><br><span class="accent">ANIME</span></h2>
            <p class="visual-desc">Suis tes séries, note tes épisodes et découvre des milliers d'animés avec une communauté passionnée.</p>
        </div>
    </div>

    <!-- RIGHT — Form -->
    <form class="reg-form-side" action="{{ url('register') }}" method="POST">
        @csrf

        <div class="progress-wrap fade-1">
            <div class="progress-meta">
                <div class="progress-label" id="progressLabel">Informations</div>
                <div class="progress-count"><span id="progressCurrent">1</span> / 2</div>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill" style="width:50%"></div>
            </div>
        </div>

        <div class="form-heading fade-2">
            <div class="form-tag" id="formTag">Étape 1 sur 2</div>
            <h1 class="form-title" id="formTitle">Tes infos</h1>
            <p class="form-subtitle">Déjà membre ? <a href="{{ url('/login') }}">Se connecter</a></p>
        </div>

        <div class="divider fade-3"></div>

        <div class="steps-container">

            <!-- STEP 1 -->
            <div class="step-panel active" id="step1">
                <div class="form">
                    <div class="row-2">
                        <div class="field" id="f-prenom">
                            <label>Prénom</label>
                            <div class="input-wrap">
                                <input name="prenom" type="text" id="prenom" placeholder="Ichigo" />
                                <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="error-msg">Prénom requis</span>
                        </div>
                        <div class="field" id="f-nom">
                            <label>Nom</label>
                            <div class="input-wrap">
                                <input name="nom" type="text" id="nom" placeholder="Kurosaki" />
                                <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="error-msg">Nom requis</span>
                        </div>
                    </div>
                    <div class="field" id="f-pseudo">
                        <label>Pseudo</label>
                        <div class="input-wrap">
                            <input name="pseudo" type="text" id="pseudo" placeholder="ShinigamiXX" />
                            <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 16c2.5 0 4.847.832 6.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="error-msg">Pseudo requis</span>
                    </div>
                    <div class="field" id="f-email">
                        <label>Adresse e-mail</label>
                        <div class="input-wrap">
                            <input name="email" type="email" id="email" placeholder="ichigo@tryanime.tv" />
                            <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="error-msg">E-mail invalide</span>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-next" onclick="nextStep(1)">
                            Continuer →
                        </button>
                    </div>
                    <div class="or-sep"><span></span>
                        <p>ou s'inscrire avec</p><span></span>
                    </div>
                    <div class="oauth-row">
                        <button type="button" class="btn-oauth">
                            <svg viewBox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                            </svg>
                            Google
                        </button>
                        <button type="button" class="btn-oauth">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z" />
                            </svg>
                            GitHub
                        </button>
                    </div>
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="step-panel" id="step2">
                <div class="form">
                    <div class="field" id="f-password">
                        <label>Mot de passe</label>
                        <div class="input-wrap has-eye">
                            <input name="password" type="password" id="password" placeholder="••••••••" />
                            <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <button type="button" class="eye-btn" id="eye1">
                                <svg id="eyeIco1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <div class="strength" id="strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="sFill"></div>
                            </div>
                            <div class="strength-label" id="sLabel">Robustesse</div>
                        </div>
                        <span class="error-msg">8 caractères minimum</span>
                    </div>
                    <div class="field" id="f-confirm">
                        <label>Confirmer le mot de passe</label>
                        <div class="input-wrap has-eye">
                            <input name="password_confirmation" type="password" id="confirm" placeholder="••••••••" />
                            <svg class="fi" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <button type="button" class="eye-btn" id="eye2">
                                <svg id="eyeIco2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <span class="error-msg">Les mots de passe ne correspondent pas</span>
                    </div>
                    <div class="form-nav">
                        <button type="button" class="btn-back" onclick="prevStep(2)">← Retour</button>
                        <button type="button" class="btn-submit-final" onclick="submitForm()">
                            Créer mon compte
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUCCESS -->
        <div class="success-screen" id="successScreen">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="success-title">BIENVENUE<br><span id="successPseudo">SENPAI</span></h2>
            <p class="success-desc">Ton compte a été créé avec succès. Tu fais désormais partie de la communauté TryAnime. Prêt à explorer des milliers d'animés ?</p>
            <button type="submit" class="btn btn-primary" style="font-family:'Bebas Neue',sans-serif;font-size:1rem;letter-spacing:0.14em;padding:14px 36px;">Accéder au catalogue</button>
        </div>

    </form>

</div>
@endsection