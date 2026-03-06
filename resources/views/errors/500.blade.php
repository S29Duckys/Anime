@extends('layouts.app')

@section('title', '500 - Erreur Serveur')

@section('styles')
@vite(['resources/css/errors/errors.css'])
@endsection

@section('content')
    <div class="site-bg-glows"></div>

    <main class="error-container">
        <div class="error-content">
            <div class="error-code">500</div>
            <h1 class="error-title">Oups! Internal Server <span>Error</span></h1>
            <p class="error-description">
                Désolé, une erreur s'est produite sur notre serveur.
                Nous travaillons pour résoudre ce problème. Réessaye plus tard.
            </p>

            <div class="error-cta">
                <a href="{{ route('accueil') }}" class="btn btn-primary">Retour à l'accueil</a>
                <a href="{{ route('genres') }}" class="btn btn-ghost">Explorer les genres</a>
            </div>

            <div class="error-suggestions">
                <h3>Ce que tu peux faire</h3>
                <ul>
                    <li><a href="{{ route('accueil') }}">Retourner à l'accueil</a></li>
                    <li><a href="{{ route('genres') }}">Consulter les genres</a></li>
                    <li><a href="javascript:location.reload()">Rafraîchir la page</a></li>
                </ul>
            </div>
        </div>

        <div class="error-visual">
            <div class="error-card">
                <svg viewBox="0 0 300 400" class="error-illustration">
                    <!-- Broken anime character -->
                    <circle cx="150" cy="100" r="45" fill="rgba(230, 57, 70, 0.2)" />
                    <circle cx="135" cy="95" r="8" fill="var(--text)" />
                    <circle cx="165" cy="95" r="8" fill="var(--text)" />
                    <path d="M 135 120 Q 150 130 165 120" stroke="var(--text)" stroke-width="2" fill="none" />

                    <!-- Floating particles -->
                    <circle cx="80" cy="60" r="3" fill="rgba(230, 57, 70, 0.3)" class="particle p1" />
                    <circle cx="220" cy="120" r="2" fill="rgba(255, 107, 53, 0.3)" class="particle p2" />
                    <circle cx="100" cy="200" r="2.5" fill="rgba(230, 57, 70, 0.25)" class="particle p3" />
                    <circle cx="200" cy="250" r="2" fill="rgba(255, 107, 53, 0.25)" class="particle p4" />
                </svg>
            </div>
        </div>
    </main>
@endsection