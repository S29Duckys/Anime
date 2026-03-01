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
        <div class="featured-tag">⚡ En vedette cette semaine</div>
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
          <a href="#" class="btn btn-primary">▶ Regarder le trailer</a>
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
      <a href="#" class="genre-card">
        <span class="genre-icon">⚔️</span>
        <div class="genre-name">Action</div>
        <div class="genre-count">1 240 titres</div>
      </a>
      <a href="#" class="genre-card">
        <span class="genre-icon">🌌</span>
        <div class="genre-name">Fantasy</div>
        <div class="genre-count">980 titres</div>
      </a>
      <a href="#" class="genre-card">
        <span class="genre-icon">💘</span>
        <div class="genre-name">Romance</div>
        <div class="genre-count">760 titres</div>
      </a>
      <a href="#" class="genre-card">
        <span class="genre-icon">🤖</span>
        <div class="genre-name">Mecha</div>
        <div class="genre-count">340 titres</div>
      </a>
      <a href="#" class="genre-card">
        <span class="genre-icon">👻</span>
        <div class="genre-name">Horreur</div>
        <div class="genre-count">290 titres</div>
      </a>
      <a href="#" class="genre-card">
        <span class="genre-icon">😂</span>
        <div class="genre-name">Comédie</div>
        <div class="genre-count">870 titres</div>
      </a>
    </div>
  </section>
@endsection