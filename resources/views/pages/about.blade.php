@extends('layouts.app')

@section('title', 'À propos — TryAnime')

@push('styles')
    @vite(['resources/css/pages/about.css'])
@endpush

@section('content')
<div class="about-wrapper">

    {{-- HERO --}}
    <div class="about-hero">
        <div class="about-hero-tag">Le projet</div>
        <h1>À propos de <span>TryAnime</span></h1>
        <p>Une plateforme créée par passion, pour les passionnés d'anime.</p>
    </div>

    {{-- PRÉSENTATION --}}
    <section class="about-section about-intro">
        <div class="about-text">
            <h2>C'est quoi TryAnime ?</h2>
            <p>
                TryAnime est une plateforme de streaming et de gestion d'animes conçue pour offrir
                une expérience moderne, rapide et agréable aux fans d'animation japonaise.
            </p>
            <p>
                Que tu sois fan de shonen épiques, de slice of life tranquilles ou de thrillers psychologiques,
                TryAnime te permet de découvrir, organiser et suivre tous tes animes au même endroit.
            </p>
            <p>
                Le projet est né d'un constat simple : les plateformes existantes manquent souvent de design
                soigné et d'une expérience utilisateur fluide. TryAnime veut changer ça.
            </p>
        </div>
        <div class="about-visual">
            <div class="about-stat-grid">
                <div class="about-stat">
                    <div class="stat-value">12<span>K+</span></div>
                    <div class="stat-label">Animes</div>
                </div>
                <div class="about-stat">
                    <div class="stat-value">48<span>K</span></div>
                    <div class="stat-label">Membres</div>
                </div>
                <div class="about-stat">
                    <div class="stat-value">850<span>+</span></div>
                    <div class="stat-label">Studios</div>
                </div>
                <div class="about-stat">
                    <div class="stat-value">2026</div>
                    <div class="stat-label">Année de création</div>
                </div>
            </div>
        </div>
    </section>

    {{-- FONCTIONNALITÉS --}}
    <section class="about-section">
        <div class="about-section-header">
            <h2>Ce que tu peux faire sur TryAnime</h2>
            <p>Des outils pensés pour les vrais fans.</p>
        </div>
        <div class="about-features">
            <div class="about-feature">
                <div class="feature-icon">🎬</div>
                <h3>Catalogue complet</h3>
                <p>Accède à des milliers d'animes classés par genre, saison, studio et popularité.</p>
            </div>
            <div class="about-feature">
                <div class="feature-icon">📋</div>
                <h3>Ma Liste</h3>
                <p>Crée ta watchlist personnelle, marque ce que tu regardes, ce que tu as terminé et ce que tu veux voir.</p>
            </div>
            <div class="about-feature">
                <div class="feature-icon">🔥</div>
                <h3>Tendances</h3>
                <p>Découvre chaque semaine les animes les plus populaires et les nouvelles sorties de la saison.</p>
            </div>
            <div class="about-feature">
                <div class="feature-icon">🔍</div>
                <h3>Recherche avancée</h3>
                <p>Filtre par genre, année, studio, nombre d'épisodes ou note pour trouver ton prochain anime.</p>
            </div>
            <div class="about-feature">
                <div class="feature-icon">⭐</div>
                <h3>Notes & Avis</h3>
                <p>Note les animes que tu as vus et partage ton avis avec la communauté.</p>
            </div>
            <div class="about-feature">
                <div class="feature-icon">🌙</div>
                <h3>Design Dark Mode</h3>
                <p>Une interface sombre, moderne et confortable pour les longues sessions de visionnage.</p>
            </div>
        </div>
    </section>

    {{-- STACK TECHNIQUE --}}
    <section class="about-section about-tech">
        <div class="about-section-header">
            <h2>Stack technique</h2>
            <p>TryAnime est construit avec des technologies modernes et performantes.</p>
        </div>
        <div class="about-tech-grid">
            <div class="tech-card">
                <div class="tech-name">Laravel 12</div>
                <div class="tech-role">Framework backend PHP</div>
            </div>
            <div class="tech-card">
                <div class="tech-name">PHP 8.2+</div>
                <div class="tech-role">Langage serveur</div>
            </div>
            <div class="tech-card">
                <div class="tech-name">SQLite</div>
                <div class="tech-role">Base de données</div>
            </div>
            <div class="tech-card">
                <div class="tech-name">Vite 7</div>
                <div class="tech-role">Bundler frontend</div>
            </div>
            <div class="tech-card">
                <div class="tech-name">Tailwind CSS 4</div>
                <div class="tech-role">Framework CSS</div>
            </div>
            <div class="tech-card">
                <div class="tech-name">Blade</div>
                <div class="tech-role">Moteur de templates</div>
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section class="about-contact">
        <h2>Une question ? Un bug ?</h2>
        <p>TryAnime est un projet en constante évolution. N'hésite pas à nous contacter pour toute remarque, suggestion ou signalement.</p>
        <div class="about-contact-actions">
            <a href="mailto:contact@tryanime.fr" class="btn btn-primary">Nous contacter</a>
            <a href="{{ route('cgu') }}" class="btn btn-ghost">Lire les CGU</a>
        </div>
    </section>

</div>
@endsection
