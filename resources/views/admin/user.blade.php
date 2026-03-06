@extends('layouts.app')

@section('title', 'Utilisateurs')

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

      <a href="/admin" class="nav-item">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
          <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
        </svg>
        Dashboard
      </a>

      <a href="/admin/users" class="nav-item active">
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
  <div class="admin-main users-main">

    <!-- Topbar -->
    <div class="admin-topbar">
      <div class="topbar-title">Gestion <span>Utilisateurs</span></div>
      <div class="topbar-right">
        <span class="topbar-time" id="adminClock">--:--:--</span>
        <div class="topbar-status">
          <span class="status-dot"></span>
          Système opérationnel
        </div>
      </div>
    </div>

    <!-- Users content -->
    <div class="users-content">

      <!-- Stats row -->
      <div class="users-stats-row">
        <div class="stat-card">
          <div class="stat-card-deco">TOT</div>
          <div class="stat-label">Total utilisateurs</div>
          <div class="stat-value">{{$countUsers}}</div>
          <div class="stat-delta up">↑ +312 cette semaine</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-deco">ACT</div>
          <div class="stat-label">Comptes actifs</div>
          <div class="stat-value">{{$countUsers - 14}}<span>7</span></div>
          <div class="stat-delta up">↑ actifs ce mois</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-deco">BAN</div>
          <div class="stat-label">Comptes bannis</div>
          <div class="stat-value">14<span>7</span></div>
          <div class="stat-delta down">↑ +3 cette semaine</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-deco">NEW</div>
          <div class="stat-label">Nouveaux (30j)</div>
          <div class="stat-value">1<span>2K</span></div>
          <div class="stat-delta up">↑ +18% vs mois dernier</div>
        </div>
      </div>

      <!-- Toolbar -->
      <div class="users-toolbar">
        <div class="toolbar-left">
          <div class="search-wrap">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" class="search-input" placeholder="Rechercher un utilisateur…" id="userSearch">
          </div>
          <div class="filter-group">
            <button class="filter-btn active" data-filter="all">Tous</button>
            <button class="filter-btn" data-filter="active">Actifs</button>
            <button class="filter-btn" data-filter="banned">Bannis</button>
            <button class="filter-btn" data-filter="pending">En attente</button>
          </div>
        </div>
        <div class="toolbar-right">
          <button class="action-btn secondary">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
              <polyline points="7 10 12 15 17 10"/>
              <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Exporter CSV
          </button>
          <button class="action-btn primary">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Ajouter un utilisateur
          </button>
        </div>
      </div>

      <!-- Table -->
      <div class="users-table-wrap">
        <table class="admin-table users-table" id="usersTable">
          <thead>
            <tr>
              <th class="th-check">
                <label class="checkbox-wrap">
                  <input type="checkbox" id="selectAll">
                  <span class="checkmark"></span>
                </label>
              </th>
              <th>
                <span class="th-sortable" data-col="pseudo">
                  Utilisateur
                  <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg>
                </span>
              </th>
              <th>
                <span class="th-sortable" data-col="email">
                  Email
                  <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg>
                </span>
              </th>
              <th>Rôle</th>
              <th>
                <span class="th-sortable" data-col="date">
                  Inscrit le
                  <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 15l5 5 5-5M7 9l5-5 5 5"/></svg>
                </span>
              </th>
              <th>Statut</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr data-status="{{ $user->banned ? 'banned' : 'active' }}" data-name="{{ strtolower($user->pseudo) }}" data-email="{{ strtolower($user->email) }}">

              <td class="td-check">
                <label class="checkbox-wrap">
                  <input type="checkbox" class="row-check">
                  <span class="checkmark"></span>
                </label>
              </td>

              <td>
                <div class="td-user">
                  <div class="td-avatar" style="background: {{ $loop->index % 2 == 0 ? 'rgba(230,57,70,0.15)' : 'rgba(124,92,191,0.15)' }}; color: {{ $loop->index % 2 == 0 ? 'var(--accent)' : 'var(--blue)' }}">
                    {{ strtoupper($user->pseudo[0]) }}
                  </div>
                  <div>
                    <span class="td-name">{{ $user->pseudo }}</span>
                    <div class="td-sub">#{{ $user->id }}</div>
                  </div>
                </div>
              </td>

              <td class="td-email">{{ $user->email }}</td>

              <td>
                @if($user->is_admin ?? false)
                  <span class="td-role admin">Admin</span>
                @else
                  <span class="td-role user">Membre</span>
                @endif
              </td>

              <td class="td-date">
                <span class="td-date-val">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</span>
                <div class="td-sub">{{ \Carbon\Carbon::parse($user->created_at)->format('H:i') }}</div>
              </td>

              <td>
                @if($user->banned ?? false)
                  <span class="td-status banned">● Banni</span>
                @else
                  <span class="td-status active">● Actif</span>
                @endif
              </td>

              <td>
                <div class="td-actions">
                  <a href="/admin/users/{{ $user->id }}" class="td-btn view" title="Voir le profil">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                      <circle cx="12" cy="12" r="3"/>
                    </svg>
                  </a>
                  <a href="/admin/users/{{ $user->id }}/edit" class="td-btn edit" title="Modifier">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                      <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                  </a>
                  <form method="POST" action="/admin/users/{{ $user->id }}/ban" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="td-btn {{ $user->banned ? 'unban' : 'ban' }}" title="{{ $user->banned ? 'Débannir' : 'Bannir' }}">
                      @if($user->banned ?? false)
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="10"/>
                        </svg>
                      @else
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
                        </svg>
                      @endif
                    </button>
                  </form>
                  <form method="POST" action="/admin/users/{{ $user->id }}" style="display:inline;" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="td-btn delete" title="Supprimer">
                      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                        <path d="M10 11v6M14 11v6"/>
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                      </svg>
                    </button>
                  </form>
                </div>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>

        <!-- Empty state -->
        @if($users->isEmpty())
        <div class="empty-state">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.3">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
          </svg>
          <p>Aucun utilisateur trouvé</p>
        </div>
        @endif

      </div>

      <!-- Pagination -->
      <div class="users-pagination">
        <div class="pagination-info">
          Affichage de <span>{{ $users->firstItem() ?? 0 }}</span> à <span>{{ $users->lastItem() ?? 0 }}</span> sur <span>{{ $users->total() ?? $countUsers }}</span> utilisateurs
        </div>
        <div class="pagination-controls">
            <button class="page-btn" disabled>
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <span class="page-dots">…</span>
            <button class="page-btn">12</button>
            <button class="page-btn">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
        </div>
      </div>

    </div><!-- /users-content -->
  </div><!-- /admin-main -->
</div><!-- /admin-shell -->
@endsection
@push('vite')
@vite(['resources/css/admin/user.css','resources/js/admin/user.js'])
@endpush