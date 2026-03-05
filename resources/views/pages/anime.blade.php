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
        <div class="cat-breadcrumb">
            <a href="{{ url('/catalogue') }}">Catalogue</a>
            <span class="sep">/</span>
            <span class="current">{{$anime->title}}</span>
        </div>
             <div class="apercu-body">

            {{-- Affiche --}}
            <div class="apercu-poster">
                <img src="{{$anime->image_url}}" alt="Magical Girl Site">
            </div>

            {{-- Informations --}}
            <div class="apercu-info">

                <h1 class="anime-main-title">{{$anime->title}}</h1>
                <p class="anime-alt-title">--</p>

                {{-- Boutons --}}
                <div class="anime-action-btns">
                    @auth
                    <form method="POST" action="{{ route('maliste.store') }}" style="display:inline;">
                        @csrf
                        <input type="hidden" name="info_anime_id" value="{{ $anime->id }}">
                        <input type="hidden" name="status" value="watching">
                        <button type="submit" class="btn-action btn-watchlist">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            + Watchlist
                        </button>
                    </form>
                    <form method="POST" action="{{ route('maliste.store') }}" style="display:inline;">
                        @csrf
                        <input type="hidden" name="info_anime_id" value="{{ $anime->id }}">
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="btn-action btn-vu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            + Vu
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="btn-action btn-watchlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        + Watchlist
                    </a>
                    <a href="{{ route('login') }}" class="btn-action btn-vu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        + Vu
                    </a>
                    @endauth
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
                       {{$anime->sinopsis}}
                    </p>
                </div>

                {{-- Genres --}}
                <div class="anime-sub-section">
                    <h2 class="anime-sub-title">GENRES</h2>
                    <hr class="anime-sub-divider">
                    <p class="anime-genres-list">{{$anime->genre}}</p>
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
@foreach ($animeFolder['allEpisodes'] as $seasonName => $episodes)
    <details class="season-block" open>
        <summary class="season-summary">
            <div class="season-thumb-wrap">
                <img class="ep-play-icon" src="{{ $anime->image_url }}" alt="">
                <span class="season-thumb-label">{{ $seasonName }}</span>
            </div>
            <span class="season-name">{{ $seasonName }}</span>
            <span class="season-ep-count">{{ count($episodes) }} épisodes</span>
            <svg class="season-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </summary>

        <div class="episodes-grid">
            @foreach ($episodes as $episode)
                <a href="video/{{$anime->slug}}/{{$seasonName}}/{{ $episode['file'] }}" class="episode-card">
                    <div class="ep-thumb">
                        <img class="ep-play-icon" src="{{ $anime->image_url }}" alt="">
                    </div>
                    <div class="ep-info">
                        <span class="ep-title">{{ $episode['file'] }}</span>
                        <span class="ep-duration">24 min</span>
                    </div>
                </a>
            @endforeach
        </div>

    </details>
@endforeach
        </div>
    </section>

</div>
@endsection
