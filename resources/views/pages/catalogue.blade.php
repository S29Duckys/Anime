@extends('layouts.app') 

@section('title', 'Catalogue')

@section('content')    
<!-- ========================================
     PAGE HEADER
     ======================================== -->
<div class="cat-header">
  <div class="cat-header-bg"></div>
  <div class="cat-header-deco">12K</div>

  <div class="cat-header-inner">
    <div>
      <div class="cat-breadcrumb">
        <a href="{{ url('/') }}">Accueil</a>
        <span class="sep">/</span>
        <span class="current">Catalogue</span>
      </div>
      <h1 class="cat-h1">
        Tout le<br>
        <em>Catalogue</em><br>
        <span class="stroke">Anime</span>
      </h1>
      <div class="cat-header-meta">
        <div class="cat-count-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
            <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
          </svg>
          <strong>12 482</strong>&nbsp;titres
        </div>
        <div class="cat-count-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
          </svg>
          <strong>850+</strong>&nbsp;studios
        </div>
      </div>
    </div>

    <div class="cat-search-wrap">
      <div class="cat-search">
        <svg class="cat-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
        </svg>
        <input type="text" id="catalogueSearch" placeholder="Rechercher un anime, studio, genre…">
        <div class="cat-search-kbd">
          <kbd>⌘</kbd><kbd>K</kbd>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ========================================
     CATALOGUE LAYOUT
     ======================================== -->
<div class="catalogue-wrap">

  <!-- ======== SIDEBAR ======== -->
  <aside class="cat-sidebar">

    <div class="sidebar-top">
      <span class="sidebar-title">Filtres</span>
      <button class="sidebar-reset" id="resetFilters">Réinitialiser</button>
    </div>

    <!-- Active filter chips -->
    <div class="active-chips" id="activeChips">
      <span class="active-chip">Action <span class="chip-x">✕</span></span>
      <span class="active-chip">Hiver 2025 <span class="chip-x">✕</span></span>
    </div>

    <!-- SORT -->
    <div class="filter-grp is-open">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Trier par</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body">
        <div class="f-sort-grid">
          <button class="f-sort-btn active">Popularité</button>
          <button class="f-sort-btn">Note</button>
          <button class="f-sort-btn">Récents</button>
          <button class="f-sort-btn">A — Z</button>
        </div>
      </div>
    </div>

    <!-- GENRE -->
    <div class="filter-grp is-open">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Genre</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body">
        <label class="f-check"><input type="checkbox" checked><label>Action</label><span class="f-check-count">1 240</span></label>
        <label class="f-check"><input type="checkbox"><label>Fantasy</label><span class="f-check-count">980</span></label>
        <label class="f-check"><input type="checkbox"><label>Romance</label><span class="f-check-count">760</span></label>
        <label class="f-check"><input type="checkbox"><label>Comédie</label><span class="f-check-count">870</span></label>
        <label class="f-check"><input type="checkbox"><label>Seinen</label><span class="f-check-count">540</span></label>
        <label class="f-check"><input type="checkbox"><label>Shonen</label><span class="f-check-count">680</span></label>
        <label class="f-check"><input type="checkbox"><label>Mecha</label><span class="f-check-count">340</span></label>
        <label class="f-check"><input type="checkbox"><label>Horreur</label><span class="f-check-count">290</span></label>
        <label class="f-check"><input type="checkbox"><label>Isekai</label><span class="f-check-count">410</span></label>
        <label class="f-check"><input type="checkbox"><label>Slice of Life</label><span class="f-check-count">620</span></label>
      </div>
    </div>

    <!-- ANNÉE -->
    <div class="filter-grp is-open">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Année</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body">
        <div class="f-range">
          <div class="f-range-row">
            <span>De <strong id="yearMin">1960</strong></span>
            <span>À <strong id="yearMax">2025</strong></span>
          </div>
          <input type="range" min="1960" max="2025" value="1960"
            oninput="document.getElementById('yearMin').textContent=this.value">
          <br style="margin-bottom:12px;">
          <input type="range" min="1960" max="2025" value="2025"
            oninput="document.getElementById('yearMax').textContent=this.value">
        </div>
      </div>
    </div>

    <!-- NOTE MINIMALE -->
    <div class="filter-grp is-open">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Note minimale</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body">
        <div class="f-range">
          <div class="f-range-row">
            <span>★ Min.</span>
            <strong id="ratingMin">7.0</strong>
          </div>
          <input type="range" min="0" max="10" step="0.1" value="7"
            oninput="document.getElementById('ratingMin').textContent=parseFloat(this.value).toFixed(1)">
        </div>
      </div>
    </div>

    <!-- STATUT -->
    <div class="filter-grp is-open">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Statut</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body">
        <label class="f-check"><input type="checkbox" checked><label>En cours</label><span class="f-check-count">342</span></label>
        <label class="f-check"><input type="checkbox" checked><label>Terminé</label><span class="f-check-count">9 800</span></label>
        <label class="f-check"><input type="checkbox"><label>À venir</label><span class="f-check-count">88</span></label>
      </div>
    </div>

    <!-- SAISON -->
    <div class="filter-grp is-open">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Saison</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body">
        <label class="f-check"><input type="checkbox"><label>🌸 Printemps</label></label>
        <label class="f-check"><input type="checkbox"><label>☀️ Été</label></label>
        <label class="f-check"><input type="checkbox"><label>🍂 Automne</label></label>
        <label class="f-check"><input type="checkbox" checked><label>❄️ Hiver</label></label>
      </div>
    </div>

    <!-- NB ÉPISODES -->
    <div class="filter-grp">
      <div class="filter-grp-head" onclick="toggleGrp(this)">
        <span class="filter-grp-lbl">Nb. Épisodes</span>
        <span class="filter-grp-arrow">▾</span>
      </div>
      <div class="filter-grp-body" style="display:none;">
        <label class="f-check"><input type="checkbox"><label>Court · 1–12</label></label>
        <label class="f-check"><input type="checkbox"><label>Moyen · 13–26</label></label>
        <label class="f-check"><input type="checkbox"><label>Long · 26–100</label></label>
        <label class="f-check"><input type="checkbox"><label>Très long · 100+</label></label>
      </div>
    </div>

  </aside>

  <!-- ======== MAIN ======== -->
  <div class="cat-main">

    <!-- Toolbar -->
    <div class="cat-toolbar">
      <span class="cat-result-txt">
        Affichage <strong>1–12</strong> sur <strong>4 820</strong> résultats
      </span>
      <div class="cat-toolbar-right">
        <select class="cat-sort-select">
          <option>Popularité ↓</option>
          <option>Note ↓</option>
          <option>Date ↓</option>
          <option>Titre A–Z</option>
        </select>
        <div class="view-toggle">
          <button class="view-btn active" id="gridViewBtn" onclick="setView('grid')" title="Grille">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
              <rect x="0" y="0" width="6" height="6" rx="1"/>
              <rect x="10" y="0" width="6" height="6" rx="1"/>
              <rect x="0" y="10" width="6" height="6" rx="1"/>
              <rect x="10" y="10" width="6" height="6" rx="1"/>
            </svg>
          </button>
          <button class="view-btn" id="listViewBtn" onclick="setView('list')" title="Liste">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
              <rect x="0" y="1"  width="16" height="2" rx="1"/>
              <rect x="0" y="7"  width="16" height="2" rx="1"/>
              <rect x="0" y="13" width="16" height="2" rx="1"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Grid -->
    <div class="cat-grid" id="catGrid">

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/1a0808/e63946?text=JJK" alt="Jujutsu Kaisen S3">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-new">Nouveau</span></div>
          <div class="cat-card-rating">★ 9.4</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Shonen · Action</div>
          <div class="cat-card-title">Jujutsu Kaisen S3</div>
          <div class="cat-card-meta"><span>24 ép.</span><span class="dot"></span><span>2025</span><span class="dot"></span><span>MAPPA</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/080a18/7c5cbf?text=FRIEREN" alt="Frieren">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-top">Top</span></div>
          <div class="cat-card-rating">★ 9.7</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Fantasy · Aventure</div>
          <div class="cat-card-title">Frieren: Beyond Journey's End</div>
          <div class="cat-card-meta"><span>28 ép.</span><span class="dot"></span><span>2024</span><span class="dot"></span><span>Madhouse</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/0a0a1a/4a90e2?text=NGE" alt="NGE">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-classic">Classique</span></div>
          <div class="cat-card-rating">★ 9.0</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Sci-Fi · Mecha</div>
          <div class="cat-card-title">Neon Genesis Evangelion</div>
          <div class="cat-card-meta"><span>26 ép.</span><span class="dot"></span><span>1995</span><span class="dot"></span><span>Gainax</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/1a1408/f4c430?text=BOCCHI" alt="Bocchi">
          <div class="cat-card-rating">★ 9.1</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Romance · Slice of Life</div>
          <div class="cat-card-title">Bocchi the Rock!</div>
          <div class="cat-card-meta"><span>12 ép.</span><span class="dot"></span><span>2022</span><span class="dot"></span><span>CloverWorks</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/120808/e63946?text=VINLAND" alt="Vinland Saga">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-top">Top</span></div>
          <div class="cat-card-rating">★ 9.5</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Seinen · Historique</div>
          <div class="cat-card-title">Vinland Saga S2</div>
          <div class="cat-card-meta"><span>24 ép.</span><span class="dot"></span><span>2023</span><span class="dot"></span><span>MAPPA</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/080f08/44c767?text=HXH" alt="HxH">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-classic">Classique</span></div>
          <div class="cat-card-rating">★ 9.1</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Shonen · Aventure</div>
          <div class="cat-card-title">Hunter × Hunter (2011)</div>
          <div class="cat-card-meta"><span>148 ép.</span><span class="dot"></span><span>2011</span><span class="dot"></span><span>Madhouse</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/080818/7c5cbf?text=AOT" alt="AOT">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-top">Top</span></div>
          <div class="cat-card-rating">★ 9.3</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Dark Fantasy · Action</div>
          <div class="cat-card-title">Attack on Titan: Final Season</div>
          <div class="cat-card-meta"><span>87 ép.</span><span class="dot"></span><span>2013</span><span class="dot"></span><span>MAPPA</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/180808/ff6b35?text=DANDADAN" alt="Dandadan">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-new">Nouveau</span></div>
          <div class="cat-card-rating">★ 8.9</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Action · Comédie</div>
          <div class="cat-card-title">Dandadan</div>
          <div class="cat-card-meta"><span>12 ép.</span><span class="dot"></span><span>2024</span><span class="dot"></span><span>Science SARU</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/08140a/44c767?text=DEMON" alt="Demon Slayer">
          <div class="cat-card-rating">★ 8.7</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Shonen · Action</div>
          <div class="cat-card-title">Demon Slayer: Kimetsu no Yaiba</div>
          <div class="cat-card-meta"><span>44 ép.</span><span class="dot"></span><span>2019</span><span class="dot"></span><span>Ufotable</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/0a0814/a855f7?text=RANMA" alt="Ranma">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-classic">Classique</span></div>
          <div class="cat-card-rating">★ 8.1</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Comédie · Romance</div>
          <div class="cat-card-title">Ranma ½</div>
          <div class="cat-card-meta"><span>161 ép.</span><span class="dot"></span><span>1989</span><span class="dot"></span><span>Fuji TV</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/14080a/e63946?text=PARASYTE" alt="Parasyte">
          <div class="cat-card-rating">★ 8.5</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Seinen · Horreur</div>
          <div class="cat-card-title">Parasyte: The Maxim</div>
          <div class="cat-card-meta"><span>24 ép.</span><span class="dot"></span><span>2014</span><span class="dot"></span><span>Madhouse</span></div>
        </div>
      </div>

      <div class="cat-card">
        <div class="cat-card-img">
          <img src="https://via.placeholder.com/240x360/080a18/4a90e2?text=BLUE+LOCK" alt="Blue Lock">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-ep">ÉP. 2</span></div>
          <div class="cat-card-rating">★ 8.3</div>
          <div class="cat-card-hover">
            <a href="#" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">Sports · Shonen</div>
          <div class="cat-card-title">Blue Lock S2</div>
          <div class="cat-card-meta"><span>24 ép.</span><span class="dot"></span><span>2025</span><span class="dot"></span><span>8bit</span></div>
        </div>
      </div>

    </div><!-- /cat-grid -->

    <!-- PAGINATION -->
    <nav class="cat-pagination">
      <a class="pag-btn disabled">←</a>
      <a href="#" class="pag-btn active">1</a>
      <a href="#" class="pag-btn">2</a>
      <a href="#" class="pag-btn">3</a>
      <span class="pag-dots">···</span>
      <a href="#" class="pag-btn">301</a>
      <a href="#" class="pag-btn">→</a>
    </nav>

  </div><!-- /cat-main -->
</div><!-- /catalogue-wrap -->

@endsection