@extends('layouts.app')

@section('title', 'Anime')

@push('styles')
    @vite('resources/css/pages/anime.css')
@endpush

@push('scripts')
    @vite('resources/js/pages/anime.js')
@endpush

@section('content')
<div class="anime-page">

    {{-- ══════════════════════════════════ APERÇU ══════════════════════════════════ --}}
    <section class="anime-apercu">

        <div class="ap-heading">
            <span class="ap-heading-title">APERÇU</span>
            <div class="ap-heading-line"></div>
        </div>

        <div class="apercu-body">

            {{-- Affiche --}}
            <div class="apercu-poster">
                <img src="{{ asset('img/placeholder.jpg') }}" alt="Magical Girl Site">
            </div>

            {{-- Informations --}}
            <div class="apercu-info">

                <h1 class="anime-main-title">{{ $anime->title }}</h1>
                <p class="anime-alt-title">Mahou Shoujo Site</p>

                {{-- Boutons --}}
                <div class="anime-action-btns">
                    <button class="btn-action btn-watchlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        + Watchlist
                    </button>
                    <button class="btn-action btn-favoris">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        + Favoris
                    </button>
                    <button class="btn-action btn-vu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        + Vu
                    </button>
                </div>

                {{-- Métas --}}
                <div class="anime-meta-box">
                    <div class="meta-row">
                        <span class="meta-label">ACTUALITÉ :</span>
                        <span class="meta-value">Aucune donnée.</span>
                    </div>
                    <div class="meta-row">
                        <span class="meta-label">CORRESPONDANCE (ANIME/MANGA) :</span>
                        <span class="meta-value">Aucune donnée.</span>
                    </div>
                </div>

                {{-- Synopsis --}}
                <div class="anime-sub-section">
                    <h2 class="anime-sub-title">SYNOPSIS</h2>
                    <hr class="anime-sub-divider">
                    <p class="anime-synopsis">
                        Aya Asagiri est une jeune fille persécutée aussi bien à son école qu'à sa propre maison.
                        Alors qu'un jour, elle songeait à se suicider, une page d'un mystérieux site internet,
                        Mahou Shoujo Site, s'est ouverte sur son ordinateur lui révélant qu'elle va être une Magical Girl !
                    </p>
                </div>

                {{-- Genres --}}
                <div class="anime-sub-section">
                    <h2 class="anime-sub-title">GENRES</h2>
                    <hr class="anime-sub-divider">
                    <p class="anime-genres-list">Action, Drame, Psychologique, Surnaturel</p>
                </div>

            </div>
        </div>
    </section>

    {{-- ══════════════════════════════ SAISONS & ÉPISODES ══════════════════════════════ --}}
    <section class="anime-episodes-wrap">

        <div class="ap-heading">
            <span class="ap-heading-title">ANIME</span>
            <div class="ap-heading-line"></div>
        </div>

        <div class="seasons-list">

            {{-- ── Saison 1 (ouverte par défaut) ── --}}
            <details class="season-block" open>
                <summary class="season-summary">
                    <div class="season-thumb-wrap">
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Saison 1">
                        <span class="season-thumb-label">Saison 1</span>
                    </div>
                    <span class="season-name">Saison 1</span>
                    <span class="season-ep-count">12 épisodes · 2018</span>
                    <svg class="season-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </summary>

                <div class="episodes-grid">
                    @for ($i = 1; $i <= 12; $i++)
                    <a href="#" class="episode-card">
                        <div class="ep-thumb">
                            <img src="{{ asset('img/placeholder.jpg') }}" alt="Épisode {{ $i }}">
                            <div class="ep-play-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <span class="ep-num-badge">EP {{ $i }}</span>
                        </div>
                        <div class="ep-info">
                            <span class="ep-number">Épisode {{ $i }}</span>
                            <span class="ep-title">Titre de l'épisode {{ $i }}</span>
                            <span class="ep-duration">24 min</span>
                        </div>
                    </a>
                    @endfor
                </div>
            </details>

            {{-- ── Saison 2 (fermée par défaut) ── --}}
            <details class="season-block">
                <summary class="season-summary">
                    <div class="season-thumb-wrap">
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="Saison 2">
                        <span class="season-thumb-label">Saison 2</span>
                    </div>
                    <span class="season-name">Saison 2</span>
                    <span class="season-ep-count">8 épisodes · 2020</span>
                    <svg class="season-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </summary>

                <div class="episodes-grid">
                    @for ($i = 1; $i <= 8; $i++)
                    <a href="#" class="episode-card">
                        <div class="ep-thumb">
                            <img src="{{ asset('img/placeholder.jpg') }}" alt="Épisode {{ $i }}">
                            <div class="ep-play-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <span class="ep-num-badge">EP {{ $i }}</span>
                        </div>
                        <div class="ep-info">
                            <span class="ep-number">Épisode {{ $i }}</span>
                            <span class="ep-title">Titre de l'épisode {{ $i }}</span>
                            <span class="ep-duration">24 min</span>
                        </div>
                    </a>
                    @endfor
                </div>
            </details>

        </div>
    </section>

</div>
@endsection
