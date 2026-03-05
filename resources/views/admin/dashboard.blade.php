@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="admin-shell">

  <!-- ============ SIDEBAR ============ -->
  <aside class="admin-sidebar">

    <div class="sidebar-brand">
      <a href="{{ url('/') }}" class="sidebar-logo">Try<span>Anime</span></a>
      <div class="sidebar-admin-tag">— Panneau Admin</div>
    </div>

    <nav class="sidebar-nav">

      <div class="nav-section-label">Général</div>

      <a href="/admin" class="nav-item active">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
          <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
        </svg>
        Dashboard
      </a>

      <a href="/admin/users" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
          <circle cx="9" cy="7" r="4"/>
          <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
        </svg>
        Utilisateurs
        <span class="nav-badge">{{$countUsers}}</span>
      </a>

      <a href="/admin/animes" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/>
        </svg>
        Animes
        <span class="nav-badge">12K</span>
      </a>

      <div class="nav-section-label" style="margin-top:8px;">Contenu</div>

      <a href="/admin/genres" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
        </svg>
        Genres
      </a>

      <a href="/admin/studios" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
          <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        Studios
      </a>

      <a href="/admin/saisons" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/>
          <line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
        </svg>
        Saisons
      </a>

      <div class="nav-section-label" style="margin-top:8px;">Système</div>

      <a href="/admin/logs" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
          <polyline points="14 2 14 8 20 8"/>
        </svg>
        Logs
      </a>

      <a href="/admin/settings" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="3"/>
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
        </svg>
        Paramètres
      </a>

    </nav>

    <div class="sidebar-user">
      <div class="user-avatar">{{auth()->user()->pseudo[0]}}</div>
      <div class="user-info">
        <div class="user-name">{{ auth()->user()->pseudo ?? 'Admin' }}</div>
        <div class="user-role">Administrateur</div>
      </div>
      <form method="GET" action="/">
        @csrf
        <button type="click" class="user-logout" title="Déconnexion">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
          </svg>
        </button>
      </form>
    </div>

  </aside>

  <!-- ============ MAIN ============ -->
  <div class="admin-main">

    <!-- Topbar -->
    <div class="admin-topbar">
      <div class="topbar-title">Dashboard <span>Admin</span></div>
      <div class="topbar-right">
        <span class="topbar-time" id="adminClock">--:--:--</span>
        <div class="topbar-status">
          <span class="status-dot"></span>
          Système opérationnel
        </div>
      </div>
    </div>

    <!-- Content grid -->
    <div class="admin-content">

      <!-- STAT 1 -->
      <div class="stat-card">
        <div class="stat-card-deco">USR</div>
        <div class="stat-label">Utilisateurs</div>
        <div class="stat-value">{{$countUsers}}</div>
        <div class="stat-delta up">↑ +312 cette semaine</div>
      </div>

      <!-- STAT 2 -->
      <div class="stat-card">
        <div class="stat-card-deco">ANI</div>
        <div class="stat-label">Animes</div>
        <div class="stat-value">{{$countAnimes}}</div>
        <div class="stat-delta up">↑ +24 ce mois</div>
      </div>

      <!-- STAT 3 -->
      <div class="stat-card">
        <div class="stat-card-deco">BAN</div>
        <div class="stat-label">Comptes bannis</div>
        <div class="stat-value">14<span>7</span></div>
        <div class="stat-delta down">↑ +3 cette semaine</div>
      </div>

      <!-- TABLE USERS -->
      <div class="admin-table-wrap">
        <div class="panel-head">
          <span class="panel-title">Derniers <span>utilisateurs</span></span>
          <a href="/admin/users" class="panel-action">Voir tout →</a>
        </div>
        <table class="admin-table">
          <thead>
            <tr>
              <th>Utilisateur</th>
              <th>Email</th>
              <th>Inscrit le</th>
              <th>Statut</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($users as $user)
            <tr>

              <td><div class="td-user"><div class="td-avatar">{{$user->pseudo[0]}}</div><span class="td-name">{{ $user->pseudo }}</span></div></td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td><span class="td-status active">● Actif</span></td>
            </tr>
              @endforeach
          </tbody>
        </table>
      </div>

      <!-- ANIMES LIST -->
      <div class="admin-animes-wrap">
        <div class="panel-head">
          <span class="panel-title">Top <span>Animes</span></span>
          <a href="/admin/animes" class="panel-action">Voir tout →</a>
        </div>
        <div class="anime-list-item">
          <div class="anime-thumb"><img src="https://via.placeholder.com/30x42/1a0808/e63946?text=J" alt=""></div>
          <div class="anime-info">
            <div class="anime-item-title">Jujutsu Kaisen S3</div>
            <div class="anime-item-meta">MAPPA · 2025</div>
          </div>
          <div class="anime-item-rating">★ 9.4</div>
        </div>
        <div class="anime-list-item">
          <div class="anime-thumb"><img src="https://via.placeholder.com/30x42/080a18/7c5cbf?text=F" alt=""></div>
          <div class="anime-info">
            <div class="anime-item-title">Frieren</div>
            <div class="anime-item-meta">Madhouse · 2024</div>
          </div>
          <div class="anime-item-rating">★ 9.7</div>
        </div>
        <div class="anime-list-item">
          <div class="anime-thumb"><img src="https://via.placeholder.com/30x42/120808/e63946?text=V" alt=""></div>
          <div class="anime-info">
            <div class="anime-item-title">Vinland Saga S2</div>
            <div class="anime-item-meta">MAPPA · 2023</div>
          </div>
          <div class="anime-item-rating">★ 9.5</div>
        </div>
        <div class="anime-list-item">
          <div class="anime-thumb"><img src="https://via.placeholder.com/30x42/080818/7c5cbf?text=A" alt=""></div>
          <div class="anime-info">
            <div class="anime-item-title">Attack on Titan</div>
            <div class="anime-item-meta">MAPPA · 2023</div>
          </div>
          <div class="anime-item-rating">★ 9.3</div>
        </div>
        <div class="anime-list-item">
          <div class="anime-thumb"><img src="https://via.placeholder.com/30x42/1a1408/f4c430?text=B" alt=""></div>
          <div class="anime-info">
            <div class="anime-item-title">Bocchi the Rock!</div>
            <div class="anime-item-meta">CloverWorks · 2022</div>
          </div>
          <div class="anime-item-rating">★ 9.1</div>
        </div>
      </div>

      <!-- ASIDE PANEL -->
      <div class="admin-aside">

        <!-- Bar chart -->
        <div class="aside-card">
          <div class="panel-title">Inscriptions <span>/ semaine</span></div>
          <div class="bar-chart">
            <div class="bar-col">
              <div class="bar-fill" style="height:40%; animation-delay:.1s;"></div>
              <div class="bar-lbl">L</div>
            </div>
            <div class="bar-col">
              <div class="bar-fill" style="height:65%; animation-delay:.15s;"></div>
              <div class="bar-lbl">M</div>
            </div>
            <div class="bar-col">
              <div class="bar-fill" style="height:50%; animation-delay:.2s;"></div>
              <div class="bar-lbl">M</div>
            </div>
            <div class="bar-col">
              <div class="bar-fill" style="height:80%; animation-delay:.25s;"></div>
              <div class="bar-lbl">J</div>
            </div>
            <div class="bar-col">
              <div class="bar-fill" style="height:100%; animation-delay:.3s;"></div>
              <div class="bar-lbl">V</div>
            </div>
            <div class="bar-col">
              <div class="bar-fill" style="height:70%; opacity:0.4; animation-delay:.35s;"></div>
              <div class="bar-lbl">S</div>
            </div>
            <div class="bar-col">
              <div class="bar-fill" style="height:45%; opacity:0.4; animation-delay:.4s;"></div>
              <div class="bar-lbl">D</div>
            </div>
          </div>
        </div>

        <!-- Genre stats -->
        <div class="aside-card">
          <div class="panel-title">Genres <span>populaires</span></div>
          <div class="genre-stat-list">
            <div class="genre-stat-item">
              <span class="genre-stat-label">Action</span>
              <div class="genre-stat-bar"><div class="genre-stat-fill" style="width:82%; background:var(--accent); animation-delay:.1s;"></div></div>
              <span class="genre-stat-pct">82%</span>
            </div>
            <div class="genre-stat-item">
              <span class="genre-stat-label">Fantasy</span>
              <div class="genre-stat-bar"><div class="genre-stat-fill" style="width:67%; background:var(--blue); animation-delay:.15s;"></div></div>
              <span class="genre-stat-pct">67%</span>
            </div>
            <div class="genre-stat-item">
              <span class="genre-stat-label">Comédie</span>
              <div class="genre-stat-bar"><div class="genre-stat-fill" style="width:54%; background:var(--gold); animation-delay:.2s;"></div></div>
              <span class="genre-stat-pct">54%</span>
            </div>
            <div class="genre-stat-item">
              <span class="genre-stat-label">Romance</span>
              <div class="genre-stat-bar"><div class="genre-stat-fill" style="width:41%; background:#e91e8c; animation-delay:.25s;"></div></div>
              <span class="genre-stat-pct">41%</span>
            </div>
            <div class="genre-stat-item">
              <span class="genre-stat-label">Seinen</span>
              <div class="genre-stat-bar"><div class="genre-stat-fill" style="width:33%; background:var(--green); animation-delay:.3s;"></div></div>
              <span class="genre-stat-pct">33%</span>
            </div>
          </div>
        </div>

        <!-- Quick actions -->
        <div class="aside-card">
          <div class="panel-title">Actions <span>rapides</span></div>
          <div class="quick-actions">
            <button class="quick-btn">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              Ajouter un anime
            </button>
            <button class="quick-btn">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
              Ajouter un utilisateur
            </button>
            <button class="quick-btn">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
              Exporter les logs
            </button>
          </div>
        </div>

      </div><!-- /aside -->

    </div><!-- /admin-content -->
  </div><!-- /admin-main -->
</div><!-- /admin-shell -->
@endsection