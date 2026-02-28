<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TryAnime — Accueil</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+JP:wght@300;400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js','resources/js/components/cursorAnimation.js'])

</head>

<body>

  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- NAV -->
  <nav>
    <a href="{{ url('/') }}" class="logo">Try<span>Anime</span></a>
    <ul class="nav-links">
      <li><a href="#">Catalogue</a></li>
      <li><a href="#">Tendances</a></li>
      <li><a href="#">Genres</a></li>
      <li><a href="#">Saisons</a></li>
      <li><a href="#">Ma Liste</a></li>
    </ul>
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
        <a href="{{ url('/login') }}" class="btn btn-ghost">Connexion</a>
        <a href="{{ url('/register') }}" class="btn btn-primary">S'inscrire</a>
      @endauth
    </div>
  </nav>

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
      <div class="hero-badge">Nouveau — Saison Hiver 2025</div>
      <h1 class="hero-title">
        Ton Univers<br>
        <span class="stroke">Anime</span><br>
        <span class="accent">Sans Limites</span>
      </h1>
      <p class="hero-desc">Des milliers d'animes, des classiques aux dernières sorties. Crée ta watchlist, note tes séries et découvre ta prochaine obsession.</p>
      <div class="hero-cta">
        <a href="#" class="btn btn-primary">Commencer à regarder</a>
        <a href="#" class="btn btn-ghost">Explorer le catalogue</a>
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
      <h2 class="section-title">Tendances <span>cette semaine</span> {{ $nmb }}</h2>
      <a href="#" class="section-link">Voir tout</a>
    </div>
    <div class="anime-grid">

      <div class="anime-card">
        <div class="anime-rank">01</div>
        <div class="new-badge">Nouveau</div>
        <img src="https://via.placeholder.com/240x360/1a0a0a/e63946?text=ANIME" alt="Anime 1">
        <div class="anime-card-info">
          <div class="anime-genre">Shonen · Action</div>
          <div class="anime-name">Jujutsu Kaisen S3</div>
          <div class="anime-meta">
            <span class="rating">★ 9.4</span>
            <span>24 ép.</span>
            <span>2025</span>
          </div>
        </div>
      </div>

      <div class="anime-card">
        <div class="anime-rank">02</div>
        <img src="https://via.placeholder.com/240x360/0a1a0a/ff6b35?text=ANIME" alt="Anime 2">
        <div class="anime-card-info">
          <div class="anime-genre">Fantasy · Aventure</div>
          <div class="anime-name">Frieren : Beyond Journey's End</div>
          <div class="anime-meta">
            <span class="rating">★ 9.7</span>
            <span>28 ép.</span>
            <span>2024</span>
          </div>
        </div>
      </div>

      <div class="anime-card">
        <div class="anime-rank">03</div>
        <div class="new-badge">ÉP.</div>
        <img src="https://via.placeholder.com/240x360/0a0a1a/7c5cbf?text=ANIME" alt="Anime 3">
        <div class="anime-card-info">
          <div class="anime-genre">Sci-Fi · Mecha</div>
          <div class="anime-name">Neon Genesis Evangelion</div>
          <div class="anime-meta">
            <span class="rating">★ 9.0</span>
            <span>26 ép.</span>
            <span>Classique</span>
          </div>
        </div>
      </div>

      <div class="anime-card">
        <div class="anime-rank">04</div>
        <img src="https://via.placeholder.com/240x360/1a1a0a/f4c430?text=ANIME" alt="Anime 4">
        <div class="anime-card-info">
          <div class="anime-genre">Romance · Slice of Life</div>
          <div class="anime-name">Bocchi the Rock!</div>
          <div class="anime-meta">
            <span class="rating">★ 9.1</span>
            <span>12 ép.</span>
            <span>2022</span>
          </div>
        </div>
      </div>

      <div class="anime-card">
        <div class="anime-rank">05</div>
        <div class="new-badge">TOP</div>
        <img src="https://via.placeholder.com/240x360/150a0a/e63946?text=ANIME" alt="Anime 5">
        <div class="anime-card-info">
          <div class="anime-genre">Seinen · Thriller</div>
          <div class="anime-name">Vinland Saga S2</div>
          <div class="anime-meta">
            <span class="rating">★ 9.5</span>
            <span>24 ép.</span>
            <span>2023</span>
          </div>
        </div>
      </div>

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

  <!-- FOOTER -->
  <footer>
    <div class="footer-logo">Try<span>Anime</span></div>
    <div class="footer-text">© 2025 TryAnime — Projet Laravel Personnel</div>
    <div class="footer-links">
      <a href="#">À propos</a>
      <a href="#">Contact</a>
      <a href="#">CGU</a>
    </div>
  </footer>

  <script>

  </script>

</body>

</html>