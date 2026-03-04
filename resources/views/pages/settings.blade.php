@extends('layouts.app')

@section('title', 'Parametres')

@push('styles')
  @vite(['resources/css/pages/settings.css'])
@endpush

@section('content')

<div class="settings-wrap">

  <header class="settings-header">
    <div class="settings-header__left">
      <div class="settings-header__eyebrow">Mon compte</div>
      <h1 class="settings-header__title">Param<span>etres</span></h1>
    </div>
    <div class="settings-header__meta">
      <strong>ShinobiX</strong>
      Membre depuis janv. 2024
    </div>
  </header>

  <div class="settings-layout">

    <aside class="settings-sidebar">
      <nav class="settings-nav" aria-label="Navigation parametres">

        <span class="settings-nav__label">Compte</span>

        <a href="#" class="settings-nav__item active" data-panel="profil">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
          </svg>
          <span>Profil</span>
        </a>

        <a href="#" class="settings-nav__item" data-panel="securite">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
          </svg>
          <span>Securite</span>
        </a>

        <span class="settings-nav__label">Preferences</span>

        <a href="#" class="settings-nav__item" data-panel="notifications">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
          </svg>
          <span>Notifications</span>
          <em class="settings-nav__badge">2</em>
        </a>

        <a href="#" class="settings-nav__item" data-panel="preferences">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
          </svg>
          <span>Affichage</span>
        </a>

        <div class="settings-nav__sep" aria-hidden="true"></div>

        <a href="#" class="settings-nav__item settings-nav__item--danger" data-panel="danger">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/>
          </svg>
          <span>Danger</span>
        </a>

      </nav>
    </aside>

    <div class="settings-panels">

      <section class="settings-panel active" id="panel-profil" aria-labelledby="panel-profil-title">
        <div class="s-card">
          <div class="s-card__header">
            <div class="s-card__header-text">
              <div class="s-card__title" id="panel-profil-title">Informations du profil</div>
              <div class="s-card__subtitle">Modifiez votre pseudo, bio et photo de profil.</div>
            </div>
          </div>

          <div class="s-avatar-row">
            @if(auth()->user()->avatar)
              <div class="s-avatar">
            <img src="storage/{{ auth()->user()->avatar }}"class="s-avatar__img" id="avatarInitial" aria-label="Avatar de ShinobiX"/>
        <button class="s-avatar__edit" aria-label="Modifier l'avatar">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
        </svg>
        </button>
        </div>
            @else
            <div class="s-avatar">
            <div class="s-avatar__img" id="avatarInitial" aria-label="Avatar de ShinobiX">
            {{$user->pseudo[0]}}
             </div>
        <button class="s-avatar__edit" aria-label="Modifier l'avatar">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
        </svg>
        </button>
        </div>
            @endif
            <div class="s-avatar-info">
              <div class="s-avatar-info__name">{{$user->pseudo}}</div>
              <div class="s-avatar-info__email">{{$user->email}}</div>
              <div class="s-avatar-info__badge">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
                Membre verifie
              </div>
            </div>
          </div>

          <div class="s-stats-row" aria-label="Statistiques du compte">
            <div class="s-stat-box">
              <div class="s-stat-box__num">{{$animeMaListe}}</div>
              <div class="s-stat-box__label">En liste</div>
            </div>
            <div class="s-stat-box">
              <div class="s-stat-box__num">132</div>
              <div class="s-stat-box__label">Vus</div>
            </div>
            <div class="s-stat-box">
              <div class="s-stat-box__num">28</div>
              <div class="s-stat-box__label">Avis</div>
            </div>
          </div>

          <form method="POST" action="{{Route('setting.profil')}}" id="form-profil"  enctype="multipart/form-data" novalidate>
            @csrf
          <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display:none">

            <div class="s-form-grid">
              <div class="s-field">
                <label class="s-label" for="pseudo">Pseudo</label>
                <input class="s-input" type="text" id="pseudo" name="pseudo" value="{{$user->pseudo}}" autocomplete="username" required>
              </div>
              <div class="s-field">
                <label class="s-label" for="email">Email</label>
                <input class="s-input" type="email" id="email" name="email" value="{{$user->email}}" autocomplete="email" required>
              </div>
              <div class="s-field s-field--full">
                <label class="s-label" for="bio">Bio <span style="opacity:.4;font-weight:400">- optionnel</span></label>
                <textarea class="s-input" id="bio" name="bio" rows="3" maxlength="200" placeholder="Parle un peu de toi..." style="resize:vertical">{{auth()->user()->bio}}</textarea>
                <span class="s-hint" id="bio-count">0 / 200 caracteres</span>
              </div>
            </div>
            <div class="s-save-bar">
              <span class="s-save-msg" id="profil-saved" role="status" aria-live="polite">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                Sauvegarde
              </span>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </section>

      <section class="settings-panel" id="panel-securite" aria-labelledby="panel-securite-title">
        <div class="s-card">
          <div class="s-card__header">
            <div class="s-card__header-text">
              <div class="s-card__title" id="panel-securite-title">Mot de passe</div>
              <div class="s-card__subtitle">Choisissez un mot de passe fort d'au moins 8 caracteres.</div>
            </div>
          </div>
          <form method="POST" action="" id="form-password" novalidate>
            @csrf
            <div class="s-form-grid s-form-grid--full">
              <div class="s-field">
                <label class="s-label" for="current_password">Mot de passe actuel</label>
                <div class="s-input-wrap">
                  <input class="s-input" type="password" id="current_password" name="current_password" autocomplete="current-password" required>
                  <button type="button" class="s-input-eye" data-target="current_password" aria-label="Afficher/masquer">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="s-field">
                <label class="s-label" for="new_password">Nouveau mot de passe</label>
                <div class="s-input-wrap">
                  <input class="s-input" type="password" id="new_password" name="new_password" autocomplete="new-password" required>
                  <button type="button" class="s-input-eye" data-target="new_password" aria-label="Afficher/masquer">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                  </button>
                </div>
                <div class="s-strength" aria-label="Force du mot de passe" role="meter">
                  <div class="s-strength__bar" id="str1"></div>
                  <div class="s-strength__bar" id="str2"></div>
                  <div class="s-strength__bar" id="str3"></div>
                  <div class="s-strength__bar" id="str4"></div>
                </div>
              </div>
              <div class="s-field">
                <label class="s-label" for="new_password_confirmation">Confirmer</label>
                <div class="s-input-wrap">
                  <input class="s-input" type="password" id="new_password_confirmation" name="new_password_confirmation" autocomplete="new-password" required>
                  <button type="button" class="s-input-eye" data-target="new_password_confirmation" aria-label="Afficher/masquer">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                  </button>
                </div>
                <span class="s-hint" id="pw-match"></span>
              </div>
            </div>
            <div class="s-save-bar">
              <button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
            </div>
          </form>
        </div>
      </section>

      <section class="settings-panel" id="panel-notifications" aria-labelledby="panel-notif-title">
        <div class="s-card">
          <div class="s-card__header">
            <div class="s-card__header-text">
              <div class="s-card__title" id="panel-notif-title">Notifications</div>
              <div class="s-card__subtitle">Choisissez ce que vous souhaitez recevoir.</div>
            </div>
          </div>
          <form method="POST" action="" id="form-notif">
            @csrf
            @method('PATCH')
            <div class="s-toggle-row">
              <div class="s-toggle-info">
                <div class="s-toggle-info__label">Nouveaux episodes</div>
                <div class="s-toggle-info__desc">Alertes quand un nouvel episode sort dans ma liste.</div>
              </div>
              <label class="s-switch" aria-label="Nouveaux episodes">
                <input type="checkbox" name="notif_new_episode" value="1" checked>
                <span class="s-switch__track"></span>
              </label>
            </div>
            <div class="s-toggle-row">
              <div class="s-toggle-info">
                <div class="s-toggle-info__label">Nouvelles saisons</div>
                <div class="s-toggle-info__desc">Avertissement lors du lancement d'une nouvelle saison.</div>
              </div>
              <label class="s-switch" aria-label="Nouvelles saisons">
                <input type="checkbox" name="notif_new_season" value="1" checked>
                <span class="s-switch__track"></span>
              </label>
            </div>
            <div class="s-toggle-row">
              <div class="s-toggle-info">
                <div class="s-toggle-info__label">Tendances de la semaine</div>
                <div class="s-toggle-info__desc">Resume hebdomadaire des animes les plus populaires.</div>
              </div>
              <label class="s-switch" aria-label="Tendances">
                <input type="checkbox" name="notif_trending" value="1">
                <span class="s-switch__track"></span>
              </label>
            </div>
            <div class="s-toggle-row">
              <div class="s-toggle-info">
                <div class="s-toggle-info__label">Newsletter</div>
                <div class="s-toggle-info__desc">Actualites, selections et recommandations TryAnime.</div>
              </div>
              <label class="s-switch" aria-label="Newsletter">
                <input type="checkbox" name="notif_newsletter" value="1">
                <span class="s-switch__track"></span>
              </label>
            </div>
            <div class="s-save-bar">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </section>

      <section class="settings-panel" id="panel-preferences" aria-labelledby="panel-pref-title">
        <div class="s-card">
          <div class="s-card__header">
            <div class="s-card__header-text">
              <div class="s-card__title" id="panel-pref-title">Preferences d'affichage</div>
              <div class="s-card__subtitle">Personnalisez votre experience sur TryAnime.</div>
            </div>
          </div>
          <form method="POST" action="" id="form-prefs">
            @csrf
            @method('PATCH')
            <div class="s-form-grid">
              <div class="s-field">
                <label class="s-label" for="pref_language">Langue</label>
                <select class="s-select" id="pref_language" name="pref_language">
                  <option value="fr" selected>Francais</option>
                  <option value="en">English</option>
                  <option value="ja">Japanese</option>
                </select>
              </div>
              <div class="s-field">
                <label class="s-label" for="pref_grid">Vue par defaut</label>
                <select class="s-select" id="pref_grid" name="pref_grid">
                  <option value="grid" selected>Grille</option>
                  <option value="list">Liste</option>
                </select>
              </div>
            </div>
            <div class="s-save-bar" style="margin-top:20px">
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>
      </section>

      <section class="settings-panel" id="panel-danger" aria-labelledby="panel-danger-title">
        <div class="s-card s-danger-card">
          <div class="s-card__header">
            <div class="s-card__header-text">
              <div class="s-card__title" id="panel-danger-title">Zone de danger</div>
              <div class="s-card__subtitle">Ces actions sont irreversibles. Procedez avec precaution.</div>
            </div>
          </div>
          <div class="s-danger-row">
            <div class="s-danger-info">
              <div class="s-danger-info__label">Reinitialiser ma liste</div>
              <div class="s-danger-info__desc">Supprime tous les animes de votre watchlist. Vos avis seront conserves.</div>
            </div>
            <button type="button" class="btn-danger" data-modal="modal-reset-list">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.51"/>
              </svg>
              Reinitialiser
            </button>
          </div>
          <div class="s-danger-row">
            <div class="s-danger-info">
              <div class="s-danger-info__label">Supprimer mon compte</div>
              <div class="s-danger-info__desc">Supprime definitivement votre compte, votre liste et toutes vos donnees.</div>
            </div>
            <button type="button" class="btn-danger" data-modal="modal-delete-account">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                <path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/>
              </svg>
              Supprimer le compte
            </button>
          </div>
        </div>
      </section>

    </div>
  </div>
</div>

<div class="s-modal-overlay" id="modal-reset-list" role="dialog" aria-modal="true" aria-labelledby="modal-reset-title">
  <div class="s-modal">
    <div class="s-modal__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.51"/>
      </svg>
    </div>
    <div class="s-modal__title" id="modal-reset-title">Reinitialiser la liste ?</div>
    <div class="s-modal__desc">Tous les animes de votre watchlist seront supprimes. Cette action est irreversible.</div>
    <div class="s-modal__actions">
      <button type="button" class="btn btn-ghost" data-close-modal>Annuler</button>
      <form method="POST" action="" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Confirmer</button>
      </form>
    </div>
  </div>
</div>

<div class="s-modal-overlay" id="modal-delete-account" role="dialog" aria-modal="true" aria-labelledby="modal-delete-title">
  <div class="s-modal">
    <div class="s-modal__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
      </svg>
    </div>
    <div class="s-modal__title" id="modal-delete-title">Supprimer le compte ?</div>
    <div class="s-modal__desc">Cette action est <strong style="color:var(--accent)">permanente et irreversible</strong>. Toutes vos donnees seront effacees.</div>
    <div class="s-modal__confirm">Confirmez en tapant votre pseudo :</div>
    <input class="s-input" type="text" id="confirm-pseudo" placeholder="ShinobiX" autocomplete="off">
    <div class="s-modal__actions">
      <button type="button" class="btn btn-ghost" data-close-modal>Annuler</button>
      <form method="POST" action="" id="form-delete-account" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary" id="btn-confirm-delete" disabled>Supprimer</button>
      </form>
    </div>
  </div>
</div>

@endsection
