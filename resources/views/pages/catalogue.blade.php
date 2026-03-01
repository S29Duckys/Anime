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

      @foreach ($catalogueAnime as $elem)
          <div class="cat-card">
        <div class="cat-card-img">
          <img src="{{$elem->image_url}}" alt="Jujutsu Kaisen S3">
          <div class="cat-card-badges"><span class="cat-badge cat-badge-new">Nouveau</span></div>
          <div class="cat-card-rating">★ 9.4</div>
          <div class="cat-card-hover">
            <a href="/anime/{{$elem->slug}}" class="cat-hover-btn cat-hover-watch">▶ Regarder</a>
            <button class="cat-hover-btn cat-hover-list">+ Ma liste</button>
          </div>
        </div>
        <div class="cat-card-body">
          <div class="cat-card-genre">{{$elem->genre}}</div>
          <div class="cat-card-title">{{$elem->title}}</div>
          <div class="cat-card-meta"><span>24 ép.</span><span class="dot"></span><span>2025</span><span class="dot"></span><span>MAPPA</span></div>
        </div>
      </div>
      @endforeach
      </div>

    </div><!-- /cat-grid -->

    <!-- PAGINATION -->
<nav class="cat-pagination">
    <a class="pag-btn disabled">←</a>

    <a href="?page=1" class="pag-btn {{ request()->query('page', 1) == 1 ? 'active' : '' }}">1</a>
    <a href="?page=2" class="pag-btn {{ request()->query('page', 1) == 2 ? 'active' : '' }}">2</a>
    <a href="?page=3" class="pag-btn {{ request()->query('page', 1) == 3 ? 'active' : '' }}">3</a>
    <span class="pag-dots">···</span>
    <a href="?page={{ $totalPage }}" class="pag-btn {{ request()->query('page', 1) == $totalPage ? 'active' : '' }}">{{ $totalPage }}</a>

    <a href="#" class="pag-btn">→</a>
</nav>

  </div><!-- /cat-main -->
</div><!-- /catalogue-wrap -->

@endsection