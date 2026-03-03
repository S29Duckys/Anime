@extends('layouts.app')

@section('title', 'Catalogue')

@section('content')

{{-- ═══════════════════════════════════════
     PAGE HEADER
═══════════════════════════════════════ --}}
<div class="cat-header">
    <div class="cat-header-bg" aria-hidden="true"></div>
    <div class="cat-header-deco" aria-hidden="true">12K</div>

    <div class="cat-header-inner">
        <div>
            <nav class="cat-breadcrumb" aria-label="Fil d'Ariane">
                <a href="{{ route('accueil') }}">Accueil</a>
                <span class="sep" aria-hidden="true">/</span>
                <span class="current" aria-current="page">Catalogue</span>
            </nav>

            <h1 class="cat-h1">
                Tout le<br>
                <em>Catalogue</em><br>
                <span class="cat-h1__stroke">Anime</span>
            </h1>

            <div class="cat-header-meta">
                <div class="cat-count-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                        <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                    </svg>
                    <strong>12 482</strong>&nbsp;titres
                </div>
                <div class="cat-count-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <strong>850+</strong>&nbsp;studios
                </div>
            </div>
        </div>

        <div class="cat-search-wrap">
            <div class="cat-search" role="search">
                <svg class="cat-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
                <input
                    type="search"
                    name="searchBar"
                    id="catalogueSearch"
                    placeholder="Rechercher un anime, studio, genre…"
                    autocomplete="off"
                    spellcheck="false"
                    aria-label="Rechercher dans le catalogue"
                >
                <div class="cat-search-kbd" aria-hidden="true">
                    <kbd>⌘</kbd><kbd>K</kbd>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════
     CATALOGUE LAYOUT
═══════════════════════════════════════ --}}
<div class="catalogue-wrap">

    {{-- ── SIDEBAR ── --}}
    <aside class="cat-sidebar" aria-label="Filtres">

        <div class="sidebar-top">
            <span class="sidebar-title">Filtres</span>
            <button class="sidebar-reset" id="resetFilters" type="button">Réinitialiser</button>
        </div>

        <div class="active-chips" id="activeChips" aria-live="polite">
            <span class="active-chip">Action <span class="chip-x" aria-label="Retirer">✕</span></span>
            <span class="active-chip">Hiver 2025 <span class="chip-x" aria-label="Retirer">✕</span></span>
        </div>

        {{-- SORT --}}
        <div class="filter-grp is-open">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="true">
                <span class="filter-grp-lbl">Trier par</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body">
                <div class="f-sort-grid">
                    <button class="f-sort-btn active" type="button">Popularité</button>
                    <button class="f-sort-btn" type="button">Note</button>
                    <button class="f-sort-btn" type="button">Récents</button>
                    <button class="f-sort-btn" type="button">A — Z</button>
                </div>
            </div>
        </div>

        {{-- GENRE --}}
        @php
            $genres = [
                ['Action',       1240],
                ['Fantasy',       980],
                ['Romance',       760],
                ['Comédie',       870],
                ['Seinen',        540],
                ['Shonen',        680],
                ['Mecha',         340],
                ['Horreur',       290],
                ['Isekai',        410],
                ['Slice of Life', 620],
            ];
        @endphp
        <div class="filter-grp is-open">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="true">
                <span class="filter-grp-lbl">Genre</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body">
                @foreach($genres as [$name, $count])
                    <label class="f-check">
                        <input type="checkbox" {{ $name === 'Action' ? 'checked' : '' }} value="{{ $name }}">
                        <span class="f-check-label">{{ $name }}</span>
                        <span class="f-check-count">{{ number_format($count, 0, ',', ' ') }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- ANNÉE --}}
        <div class="filter-grp is-open">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="true">
                <span class="filter-grp-lbl">Année</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body">
                <div class="f-range">
                    <div class="f-range-row">
                        <span>De <strong id="yearMin">1960</strong></span>
                        <span>À <strong id="yearMax">2025</strong></span>
                    </div>
                    <input type="range" min="1960" max="2025" value="1960" aria-label="Année minimum"
                        oninput="document.getElementById('yearMin').textContent=this.value">
                    <input type="range" min="1960" max="2025" value="2025" aria-label="Année maximum" style="margin-top:12px"
                        oninput="document.getElementById('yearMax').textContent=this.value">
                </div>
            </div>
        </div>

        {{-- NOTE --}}
        <div class="filter-grp is-open">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="true">
                <span class="filter-grp-lbl">Note minimale</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body">
                <div class="f-range">
                    <div class="f-range-row">
                        <span>★ Min.</span>
                        <strong id="ratingMin">7.0</strong>
                    </div>
                    <input type="range" min="0" max="10" step="0.1" value="7" aria-label="Note minimale"
                        oninput="document.getElementById('ratingMin').textContent=parseFloat(this.value).toFixed(1)">
                </div>
            </div>
        </div>

        {{-- STATUT --}}
        @php
            $statuts = [
                ['En cours', 342,   true],
                ['Terminé',  9800,  true],
                ['À venir',  88,    false],
            ];
        @endphp
        <div class="filter-grp is-open">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="true">
                <span class="filter-grp-lbl">Statut</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body">
                @foreach($statuts as [$label, $count, $checked])
                    <label class="f-check">
                        <input type="checkbox" {{ $checked ? 'checked' : '' }} value="{{ $label }}">
                        <span class="f-check-label">{{ $label }}</span>
                        <span class="f-check-count">{{ number_format($count, 0, ',', ' ') }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- SAISON --}}
        @php
            $saisons = [
                ['🌸', 'Printemps', false],
                ['☀️', 'Été',       false],
                ['🍂', 'Automne',   false],
                ['❄️', 'Hiver',     true],
            ];
        @endphp
        <div class="filter-grp is-open">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="true">
                <span class="filter-grp-lbl">Saison</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body">
                @foreach($saisons as [$icon, $label, $checked])
                    <label class="f-check">
                        <input type="checkbox" {{ $checked ? 'checked' : '' }} value="{{ $label }}">
                        <span class="f-check-label">{{ $icon }} {{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- NB ÉPISODES --}}
        @php
            $episodes = ['Court · 1–12', 'Moyen · 13–26', 'Long · 26–100', 'Très long · 100+'];
        @endphp
        <div class="filter-grp">
            <button class="filter-grp-head" type="button" onclick="toggleGrp(this)" aria-expanded="false">
                <span class="filter-grp-lbl">Nb. Épisodes</span>
                <span class="filter-grp-arrow" aria-hidden="true">▾</span>
            </button>
            <div class="filter-grp-body" style="display:none">
                @foreach($episodes as $ep)
                    <label class="f-check">
                        <input type="checkbox" value="{{ $ep }}">
                        <span class="f-check-label">{{ $ep }}</span>
                    </label>
                @endforeach
            </div>
        </div>

    </aside>

    {{-- ── MAIN ── --}}
    <div class="cat-main">

        {{-- Toolbar --}}
        <div class="cat-toolbar">
            <span class="cat-result-txt">
                Affichage <strong>1–{{ $countPerPage }}</strong> sur <strong>{{ $count }}</strong> résultats
            </span>
            <div class="cat-toolbar-right">
                <label class="sr-only" for="catSortSelect">Trier par</label>
                <select class="cat-sort-select" id="catSortSelect">
                    <option>Popularité ↓</option>
                    <option>Note ↓</option>
                    <option>Date ↓</option>
                    <option>Titre A–Z</option>
                </select>
                <div class="view-toggle" role="group" aria-label="Mode d'affichage">
                    <button class="view-btn active" id="gridViewBtn" onclick="setView('grid')" title="Vue grille" type="button" aria-pressed="true">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <rect x="0" y="0" width="6" height="6" rx="1"/>
                            <rect x="10" y="0" width="6" height="6" rx="1"/>
                            <rect x="0" y="10" width="6" height="6" rx="1"/>
                            <rect x="10" y="10" width="6" height="6" rx="1"/>
                        </svg>
                    </button>
                    <button class="view-btn" id="listViewBtn" onclick="setView('list')" title="Vue liste" type="button" aria-pressed="false">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                            <rect x="0" y="1"  width="16" height="2" rx="1"/>
                            <rect x="0" y="7"  width="16" height="2" rx="1"/>
                            <rect x="0" y="13" width="16" height="2" rx="1"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Grid --}}
        <div class="cat-grid" id="catGrid">
            @forelse ($catalogueAnime as $index => $elem)
                <article class="cat-card" style="animation-delay: {{ $index * 0.04 }}s">
                    <div class="cat-card-img">
                        <img
                            src="{{ $elem->image_url }}"
                            alt="{{ $elem->title }}"
                            loading="{{ $index < 8 ? 'eager' : 'lazy' }}"
                            decoding="async"
                        >
                        <div class="cat-card-badges">
                            <span class="cat-badge cat-badge-new">Nouveau</span>
                        </div>
                        <div class="cat-card-rating" aria-label="Note : 9,4">★ 9.4</div>
                        <div class="cat-card-hover" aria-hidden="true">
                            <a href="{{ route('show', $elem->slug) }}" class="cat-hover-btn cat-hover-watch" tabindex="-1">▶ Regarder</a>
                            @auth
                                <form method="POST" action="{{ route('maliste.store') }}">
                                    @csrf
                                    <input type="hidden" name="info_anime_id" value="{{ $elem->id }}">
                                    <input type="hidden" name="status" value="planned">
                                    <button type="submit" class="cat-hover-btn cat-hover-list" tabindex="-1">+ Ma liste</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="cat-hover-btn cat-hover-list" tabindex="-1">+ Ma liste</a>
                            @endauth
                        </div>
                    </div>
                    <div class="cat-card-body">
                        <div class="cat-card-genre">{{ $elem->genre }}</div>
                        <div class="cat-card-title" title="{{ $elem->title }}">{{ $elem->title }}</div>
                        <div class="cat-card-meta">
                            <span>24 ép.</span>
                            <span class="dot" aria-hidden="true"></span>
                            <span>2025</span>
                            <span class="dot" aria-hidden="true"></span>
                            <span>MAPPA</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="cat-empty">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        <path d="M8 11h6M11 8v6" opacity=".4"/>
                    </svg>
                    <p>Aucun anime trouvé pour ces filtres.</p>
                    <a href="{{ route('catalogue') }}" class="btn btn-ghost">Réinitialiser les filtres</a>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($totalPage > 1)
            <nav class="cat-pagination" aria-label="Pagination">
                <a href="?page=1" class="page-btn {{ $currentPagePagination <= 1 ? 'disabled' : '' }}" aria-label="Première page">Premier</a>
                <a href="?page={{ $prevPage }}" class="pag-btn {{ $currentPagePagination <= 1 ? 'disabled' : '' }}" aria-label="Page précédente">←</a>

                @for($p = 1; $p <= min($totalPage, 5); $p++)
                    <a href="?page={{ $p }}" class="pag-btn {{ request()->query('page', 1) == $p ? 'active' : '' }}" aria-label="Page {{ $p }}" {{ request()->query('page', 1) == $p ? 'aria-current=page' : '' }}>{{ $p }}</a>
                @endfor

                @if($totalPage > 5)
                    <span class="pag-dots" aria-hidden="true">…</span>
                    <a href="?page={{ $totalPage }}" class="pag-btn {{ request()->query('page', 1) == $totalPage ? 'active' : '' }}">{{ $totalPage }}</a>
                @endif

                <a href="?page={{ $nextPage }}" class="pag-btn {{ $currentPagePagination >= $totalPage ? 'disabled' : '' }}" aria-label="Page suivante">→</a>
                <a href="?page={{ $totalPage }}" class="page-btn {{ $currentPagePagination >= $totalPage ? 'disabled' : '' }}" aria-label="Dernière page">Dernier</a>
            </nav>
        @endif

    </div>{{-- /cat-main --}}
</div>{{-- /catalogue-wrap --}}
<script>
    window.isAuthenticated = @json(auth()->check());
    window.loginUrl = "{{ route('login') }}";
    window.malisteUrl = "{{ route('maliste.store') }}";
    window.csrfToken = "{{ csrf_token() }}";
</script>
@endsection
