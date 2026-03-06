@extends('layouts.app')

@section('title', '404 - Page Not Found')

@push('vite')
@vite(['resources/css/errors/errors.css'])
@endpush

@section('content')
<div class="site-bg-glows"></div>

<main class="error-container">
    <div class="error-content">
        <div class="error-code">404</div>
        <h1 class="error-title">Oups! Page Not <span>Found</span></h1>
        <p class="error-description">
            Désolé, l'anime que tu cherches n'existe pas dans notre univers.
            Retourne à la page d'accueil pour découvrir d'autres trésors.
        </p>

        <div class="error-cta">
            <a href="{{ route('accueil') }}" class="btn btn-primary">Retour à l'accueil</a>
            <a href="{{ route('genres') }}" class="btn btn-ghost">Explorer les genres</a>
        </div>

        <div class="error-suggestions">
            <h3>Suggestions rapides</h3>
            <ul>
                <li><a href="{{ route('accueil') }}#popular">Anime populaires</a></li>
                <li><a href="{{ route('accueil') }}#trending">En tendance</a></li>
                <li><a href="{{ route('genres') }}">Tous les genres</a></li>
            </ul>
        </div>
    </div>

    <div class="error-visual">
        <div class="error-card">
            <svg viewBox="0 0 300 400" class="error-illustration">
                <!-- Sad anime character -->
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