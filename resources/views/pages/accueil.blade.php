@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

  {{-- ═══════════════════════════════════════
       HERO
  ═══════════════════════════════════════ --}}
  <section class="hero" aria-label="Héros principal">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>

    <div class="hero-cards" aria-hidden="true">
      <div class="float-card fc1"></div>
      <div class="float-card fc2"></div>
      <div class="float-card fc3"></div>
      <div class="float-card fc4"></div>
      <div class="float-card fc5"></div>
    </div>

    <div class="hero-content">
      <div class="hero-badge">
        <span class="hero-badge__dot" aria-hidden="true"></span>
        Nouveau — Saison Mars 2026
      </div>

      <h1 class="hero-title">
        Ton Univers<br>
        <span class="hero-title__stroke">Anime</span><br>
        <span class="hero-title__accent">Sans Limites</span>
      </h1>

      <p class="hero-desc">
        Des milliers d'animes, des classiques aux dernières sorties.
        Crée ta watchlist, note tes séries et découvre ta prochaine obsession.
      </p>

      <div class="hero-cta">
        <a href="#" class="btn btn-primary">Commencer à regarder</a>
        <a href="{{ route('catalogue') }}" class="btn btn-ghost">Explorer le catalogue</a>
      </div>

      <div class="hero-stats" aria-label="Statistiques">
        <div class="hero-stat">
          <div class="stat-num">12<span>K+</span></div>
          <div class="stat-label">Animes</div>
        </div>
        <div class="hero-stat">
          <div class="stat-num">48<span>K</span></div>
          <div class="stat-label">Membres</div>
        </div>
        <div class="hero-stat">
          <div class="stat-num">850<span>+</span></div>
          <div class="stat-label">Studios</div>
        </div>
      </div>
    </div>
  </section>

  {{-- ═══════════════════════════════════════
       TRENDING
  ═══════════════════════════════════════ --}}
  <section class="section-trending" aria-labelledby="trending-title">
    <div class="section-header">
      <h2 class="section-title" id="trending-title">
        Tendances <span>cette semaine</span>
        <em class="section-count">{{ $countAnime }}</em>
      </h2>
      <a href="{{ route('catalogue') }}" class="section-link">Voir tout</a>
    </div>

    <div class="anime-grid">
      @foreach ($getAnime as $index => $elem)
        <a class="anime-card" href="{{ route('show', $elem->slug) }}" aria-label="{{ $elem->title }}">
          <span class="anime-rank" aria-hidden="true">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
          <span class="new-badge">Nouveau</span>
          <img
            src="{{ $elem->image_url }}"
            alt="{{ $elem->title }}"
            loading="lazy"
            decoding="async"
          >
          <div class="anime-card-info">
            <div class="anime-genre">{{ $elem->genre }}</div>
            <div class="anime-name">{{ $elem->title }}</div>
            <div class="anime-meta" aria-label="Note et informations">
              <span class="rating" aria-label="Note : 9,4">★ 9.4</span>
              <span>24 ép.</span>
              <span>2025</span>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </section>

  {{-- ═══════════════════════════════════════
       FEATURED
  ═══════════════════════════════════════ --}}
  <section class="featured" aria-labelledby="featured-title">
    <div class="featured-inner">

      <div class="featured-visual">
        <img
          src="https://via.placeholder.com/640x400/0d1b2a/e63946?text=FEATURED+ANIME"
          alt="Attack on Titan: The Final Season"
          loading="lazy"
        >
        <button class="play-btn" aria-label="Regarder le trailer">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="white" aria-hidden="true">
            <polygon points="5,3 19,12 5,21"/>
          </svg>
        </button>
      </div>

      <div class="featured-body">
        <div class="featured-tag">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
          </svg>
          En vedette cette semaine
        </div>

        <h2 class="featured-title" id="featured-title">Attack on Titan: The Final Season</h2>

        <p class="featured-desc">
          Dans un monde où l'humanité vit retranchée derrière d'immenses murailles pour se
          protéger des Titans — des créatures géantes qui dévorent les humains — un jeune
          garçon jure de les exterminer tous après la destruction de sa ville natale.
        </p>

        <ul class="featured-tags" aria-label="Genres">
          @foreach(['Action','Dark Fantasy','Seinen','Guerre','Politique'] as $tag)
            <li><span class="tag">{{ $tag }}</span></li>
          @endforeach
        </ul>

        <div class="featured-actions">
          <a href="#" class="btn btn-primary">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <polygon points="5,3 19,12 5,21"/>
            </svg>
            Regarder le trailer
          </a>
          <a href="#" class="btn btn-ghost">+ Ma liste</a>
        </div>
      </div>

    </div>
  </section>

  {{-- ═══════════════════════════════════════
       GENRES
  ═══════════════════════════════════════ --}}
  <section class="section-genres" aria-labelledby="genres-title">
    <div class="section-header">
      <h2 class="section-title" id="genres-title">Explorer <span>par genre</span></h2>
      <a href="{{ route('genres') }}" class="section-link">Tous les genres</a>
    </div>

    <div class="genres-grid">

      @php
        $genres = [
          [
            'slug'  => 'Action',
            'label' => 'Action',
            'count' => '1 240',
            'icon'  => '<path d="M14.5 17.5L3 6V3h3l11.5 11.5"/><path d="M13 19l6-6"/><path d="M16 16l4 4"/><path d="M19 21l2-2"/><path d="M14.5 6.5L18 3h3v3l-3.5 3.5"/><path d="M5 14l4 4"/><path d="M7 17l-3 3"/>',
          ],
          [
            'slug'  => 'Fantasy',
            'label' => 'Fantasy',
            'count' => '980',
            'icon'  => '<path d="M15 4V2"/><path d="M15 16v-2"/><path d="M8 9h2"/><path d="M20 9h2"/><path d="M17.8 11.8L19 13"/><path d="M15 9h0"/><path d="M17.8 6.2L19 5"/><path d="M11 6.2L9.7 5"/><path d="M11 11.8L9.7 13"/><path d="M2 22l10-10"/><path d="M7 21l4-4"/>',
          ],
          [
            'slug'  => 'Romance',
            'label' => 'Romance',
            'count' => '760',
            'icon'  => '<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>',
          ],
          [
            'slug'  => 'Mecha',
            'label' => 'Mecha',
            'count' => '340',
            'icon'  => '<rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 2v2"/><path d="M15 2v2"/><path d="M9 20v2"/><path d="M15 20v2"/><path d="M2 9h2"/><path d="M2 15h2"/><path d="M20 9h2"/><path d="M20 15h2"/>',
          ],
          [
            'slug'  => 'Horreur',
            'label' => 'Horreur',
            'count' => '290',
            'icon'  => '<circle cx="9" cy="12" r="1"/><circle cx="15" cy="12" r="1"/><path d="M8 20v-4"/><path d="M12 20v-4"/><path d="M16 20v-4"/><path d="M3.5 16C2.5 14.5 2 12.8 2 11c0-5 4.5-9 10-9s10 4 10 9c0 1.8-.5 3.5-1.5 5H3.5z"/>',
          ],
          [
            'slug'  => 'Comédie',
            'label' => 'Comédie',
            'count' => '870',
            'icon'  => '<circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/>',
          ],
        ];
      @endphp

      @foreach ($genres as $genre)
        <a href="/catalogue?genre={{ urlencode($genre['slug']) }}" class="genre-card">
          <span class="genre-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              {!! $genre['icon'] !!}
            </svg>
          </span>
          <div class="genre-name">{{ $genre['label'] }}</div>
          <div class="genre-count">{{ $genre['count'] }} titres</div>
        </a>
      @endforeach

    </div>
  </section>

@endsection