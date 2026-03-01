@extends('layouts.app') 

@section('title', 'Accueil')

@section('content')
  <!-- HERO -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>

    <div class="hero-cards">
      <div class="float-card fc1"></div>
      <div class="float-card fc2"></div>
      <div class="float-card fc3"></div>
      <div class="float-card fc4"></div>
      <div class="float-card fc5"></div>
    </div>

    <div class="hero-content">
      <div class="hero-badge">Nouveau — Saison Mars 2026</div>
      <h1 class="hero-title">
        Ton Univers<br>
        <span class="stroke">Anime</span><br>
        <span class="accent">Sans Limites</span>
      </h1>
      <p class="hero-desc">Des milliers d'animes, des classiques aux dernières sorties. Crée ta watchlist, note tes séries et découvre ta prochaine obsession.</p>
      <div class="hero-cta">
        <a href="#" class="btn btn-primary">Commencer à regarder</a>
        <a href="/catalogue" class="btn btn-ghost">Explorer le catalogue</a>
      </div>
      <div class="hero-stats">
        <div>
          <div class="stat-num">12<span>K+</span></div>
          <div class="stat-label">Animes</div>
        </div>
        <div>
          <div class="stat-num">48<span>K</span></div>
          <div class="stat-label">Membres</div>
        </div>
        <div>
          <div class="stat-num">850<span>+</span></div>
          <div class="stat-label">Studios</div>
        </div>
      </div>
    </div>
  </section>

  <!-- TRENDING -->
  <section>
    <div class="section-header">
      <h2 class="section-title">Tendances <span>cette semaine</span> {{ $countAnime }}</h2>
      <a href="/catalogue" class="section-link">Voir tout</a>
    </div>
    <div class="anime-grid">


      @foreach ($getAnime as $elem)
        <div class="anime-card">
        <div class="anime-rank">01</div>
        <div class="new-badge">Nouveau</div>
        <img src="{{$elem->image_url}}" alt="Anime 1">
        <div class="anime-card-info">
          <div class="anime-genre">{{$elem->genre}}</div>
          <div class="anime-name">{{$elem->title}}</div>
          <div class="anime-meta">
            <span class="rating">★ 9.4</span>
            <span>24 ép.</span>
            <span>2025</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <!-- FEATURED -->
  <section class="featured">
    <div class="featured-inner">
      <div class="featured-visual">
        <img src="https://via.placeholder.com/640x400/0d1b2a/e63946?text=FEATURED+ANIME" alt="Featured">
        <div class="play-btn">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="white">
            <polygon points="5,3 19,12 5,21" />
          </svg>
        </div>
      </div>
      <div>
        <div class="featured-tag"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg> En vedette cette semaine</div>
        <h2 class="featured-title">Attack on Titan: The Final Season</h2>
        <p class="featured-desc">Dans un monde où l'humanité vit retranchée derrière d'immenses murailles pour se protéger des Titans — des créatures géantes qui dévorent les humains — un jeune garçon jure de les exterminer tous après la destruction de sa ville natale.</p>
        <div class="featured-tags">
          <span class="tag">Action</span>
          <span class="tag">Dark Fantasy</span>
          <span class="tag">Seinen</span>
          <span class="tag">Guerre</span>
          <span class="tag">Politique</span>
        </div>
        <div class="featured-actions">
          <a href="#" class="btn btn-primary"><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg> Regarder le trailer</a>
          <a href="#" class="btn btn-ghost">+ Ma liste</a>
        </div>
      </div>
    </div>
  </section>

  <!-- GENRES -->
  <section>
    <div class="section-header">
      <h2 class="section-title">Explorer <span>par genre</span></h2>
      <a href="#" class="section-link">Tous les genres</a>
    </div>
    <div class="genres-grid">
      <a href="/catalogue?genre=Action" class="genre-card">
        <span class="genre-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 17.5L3 6V3h3l11.5 11.5"/><path d="M13 19l6-6"/><path d="M16 16l4 4"/><path d="M19 21l2-2"/><path d="M14.5 6.5L18 3h3v3l-3.5 3.5"/><path d="M5 14l4 4"/><path d="M7 17l-3 3"/></svg></span>
        <div class="genre-name">Action</div>
        <div class="genre-count">1 240 titres</div>
      </a>
      <a href="/catalogue?genre=Fantasy" class="genre-card">
        <span class="genre-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M15 4V2"/><path d="M15 16v-2"/><path d="M8 9h2"/><path d="M20 9h2"/><path d="M17.8 11.8L19 13"/><path d="M15 9h0"/><path d="M17.8 6.2L19 5"/><path d="M11 6.2L9.7 5"/><path d="M11 11.8L9.7 13"/><path d="M2 22l10-10"/><path d="M7 21l4-4"/></svg></span>
        <div class="genre-name">Fantasy</div>
        <div class="genre-count">980 titres</div>
      </a>
      <a href="/catalogue?genre=Romance" class="genre-card">
        <span class="genre-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></span>
        <div class="genre-name">Romance</div>
        <div class="genre-count">760 titres</div>
      </a>
      <a href="/catalogue?genre=Mecha" class="genre-card">
        <span class="genre-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M9 2v2"/><path d="M15 2v2"/><path d="M9 20v2"/><path d="M15 20v2"/><path d="M2 9h2"/><path d="M2 15h2"/><path d="M20 9h2"/><path d="M20 15h2"/></svg></span>
        <div class="genre-name">Mecha</div>
        <div class="genre-count">340 titres</div>
      </a>
      <a href="/catalogue?genre=Horreur" class="genre-card">
        <span class="genre-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="12" r="1"/><circle cx="15" cy="12" r="1"/><path d="M8 20v-4"/><path d="M12 20v-4"/><path d="M16 20v-4"/><path d="M3.5 16C2.5 14.5 2 12.8 2 11c0-5 4.5-9 10-9s10 4 10 9c0 1.8-.5 3.5-1.5 5H3.5z"/></svg></span>
        <div class="genre-name">Horreur</div>
        <div class="genre-count">290 titres</div>
      </a>
      <a href="/catalogue?genre=Comédie" class="genre-card">
        <span class="genre-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg></span>
        <div class="genre-name">Comédie</div>
        <div class="genre-count">870 titres</div>
      </a>
    </div>
  </section>
@endsection