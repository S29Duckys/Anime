@extends('layouts.app')

@section('title', 'Ma Liste')

@section('content')
<!-- ========================================
     PAGE HEADER
     ======================================== -->
<div class="ml-header">
  <div class="ml-header-bg"></div>
  <div class="ml-header-deco">MY LIST</div>

  <div class="ml-header-inner">
    <div>
      <div class="ml-breadcrumb">
        <a href="{{ url('/') }}">Accueil</a>
        <span class="sep">/</span>
        <span class="current">Ma Liste</span>
      </div>
      <h1 class="ml-h1">
        Ma<br>
        <em>Liste</em><br>
        <span class="stroke">Anime</span>
      </h1>
      <div class="ml-header-meta">
        <div class="ml-count-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
          </svg>
          <strong>{{ $animes->count() }}</strong>&nbsp;animes sauvegardés
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ========================================
     TABS & FILTERS
     ======================================== -->
<div class="ml-content">

  @if(session('success'))
    <div class="ml-alert ml-alert-success">{{ session('success') }}</div>
  @endif
  @if(session('warning'))
    <div class="ml-alert ml-alert-warning">{{ session('warning') }}</div>
  @endif

  <div class="ml-tabs">
    <button class="ml-tab active" data-tab="all">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
        <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
      </svg>
      Tous <span class="ml-tab-count">{{ $animes->count() }}</span>
    </button>
    <button class="ml-tab" data-tab="watching">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polygon points="5 3 19 12 5 21 5 3"/>
      </svg>
      En cours <span class="ml-tab-count">{{ $animes->where('pivot.status', 'watching')->count() }}</span>
    </button>
    <button class="ml-tab" data-tab="completed">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="20 6 9 17 4 12"/>
      </svg>
      Terminés <span class="ml-tab-count">{{ $animes->where('pivot.status', 'completed')->count() }}</span>
    </button>
    <button class="ml-tab" data-tab="planned">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
      </svg>
      À voir <span class="ml-tab-count">{{ $animes->where('pivot.status', 'planned')->count() }}</span>
    </button>
  </div>

  <!-- Toolbar -->
  <div class="ml-toolbar">
    <span class="ml-result-txt">
      <strong>{{ $animes->count() }}</strong> animes dans votre liste
    </span>
    <div class="ml-toolbar-right">
      <select class="ml-sort-select">
        <option>Date d'ajout ↓</option>
        <option>Note ↓</option>
        <option>Titre A–Z</option>
      </select>
    </div>
  </div>

  <!-- ========================================
       ANIME LIST
       ======================================== -->
  @if($animes->count() > 0)
  <div class="ml-list">

    @foreach($animes as $index => $anime)
    @php
      $status = $anime->pivot->status;
      $statusLabels = ['watching' => 'En cours', 'completed' => 'Terminé', 'planned' => 'À voir'];
    @endphp
    <div class="ml-item" data-status="{{ $status }}">
      <div class="ml-item-rank">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
      <div class="ml-item-img">
        <img src="{{ $anime->image_url }}" alt="{{ $anime->title }}">
        <div class="ml-status-dot ml-status-{{ $status }}"></div>
      </div>
      <div class="ml-item-info">
        <div class="ml-item-genre">{{ $anime->genre }}</div>
        <a href="/anime/{{ $anime->slug }}" class="ml-item-title">{{ $anime->title }}</a>
        <div class="ml-item-meta">
          <span>{{ $anime->release_date }}</span>
        </div>
      </div>
      <div class="ml-item-progress">
        <div class="ml-progress-label">Progression</div>
        <div class="ml-progress-bar">
          <div class="ml-progress-fill {{ $status === 'completed' ? 'ml-progress-complete' : '' }}" style="width: {{ $status === 'completed' ? '100' : ($anime->pivot->progress * 10) }}%;"></div>
        </div>
        <div class="ml-progress-text">{{ $anime->pivot->progress }} ép.</div>
      </div>
      <div class="ml-item-rating">
        <span class="ml-star">★</span>
        <span>{{ $anime->pivot->rating ?? '—' }}</span>
      </div>
      <div class="ml-item-status">
        <span class="ml-badge ml-badge-{{ $status }}">{{ $statusLabels[$status] ?? $status }}</span>
      </div>
      <div class="ml-item-actions">
        <form method="POST" action="{{ route('maliste.destroy', $anime->id) }}" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="ml-action-btn ml-action-delete" title="Supprimer">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="3 6 5 6 21 6"/>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
            </svg>
          </button>
        </form>
      </div>
    </div>
    @endforeach

  </div><!-- /ml-list -->
  @else
  <!-- Empty state -->
  <div class="ml-empty">
    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
      <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
    </svg>
    <h3>Votre liste est vide</h3>
    <p>Ajoutez des animes depuis le catalogue pour les retrouver ici.</p>
    <a href="/catalogue" class="btn btn-primary">Explorer le catalogue</a>
  </div>
  @endif

</div><!-- /ml-content -->

@endsection