<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TryAnime — Accueil</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+JP:wght@300;400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css','resources/css/pages/settings.css','resources/css/admin/dashboard.css','resources/css/pages/video.css','resources/css/admin/user.css','resources/css/pages/login.css','resources/css/pages/register.css','resources/css/pages/catalogue.css','resources/css/pages/maliste.css','resources/css/pages/genres.css','resources/js/admin/user.js','resources/js/app.js','resources/js/pages/video.js','resources/js/components/cursorAnimation.js','resources/js/pages/login.js','resources/js/pages/register.js','resources/js/pages/settings.js','resources/js/admin/dashboard.js','resources/js/pages/catalogue.js'])
  @stack('styles')
  @stack('scripts')
</head>

<body>

    <div class="site-bg-glows" aria-hidden="true"></div>
    <div class="cursor" id="cursor"></div>
    <div class="cursor-ring" id="cursorRing"></div>

    <nav>
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="TryAnime" class="logo-img">
        </a>
        <ul class="nav-links">
        <li>
            <a class="{{ ($currentPage ?? '') === 'catalogue' ? 'activeNavBar' : '' }}" href="{{ route('catalogue') }}">Catalogue</a>
        </li>
        <li>
            <a class="{{ ($currentPage ?? '') === 'tendances' ? 'activeNavBar' : '' }}" href="{{ route('tendances') }}">Tendances</a>
        </li>
        <li>
            <a class="{{ ($currentPage ?? '') === 'genres' ? 'activeNavBar' : '' }}" href="{{ route('genres') }}">Genres</a>
        </li>
        <li>
            <a class="{{ ($currentPage ?? '') === 'saisons' ? 'activeNavBar' : '' }}" href="{{ route('saisons') }}">Saisons</a>
        </li>
        <li>
            <a class="{{ ($currentPage ?? '') === 'maliste' ? 'activeNavBar' : '' }}" href="{{ route('maliste') }}">Ma Liste</a>
        </li>
        </ul>
        <div class="nav-actions">
            @auth
                <div class="btn-me-wrapper">
                    <div class="btn-me">
                        @if (auth()->user()->avatar)
                            <img class="btn-me-avatar" src="storage/{{ auth()->user()->avatar }}" alt="{{ auth()->user()->pseudo }}">
                        @else
                        <div class="btn-me-avatar">{{ strtoupper(substr(auth()->user()->pseudo, 0, 1)) }}</div>
                        @endif
                        <span class="btn-me-pseudo">{{ auth()->user()->pseudo }}</span>
                        <svg class="btn-me-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <div class="btn-me-dropdown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            @if(auth()->user()->isAdmin ?? false)
                                <a href="/admin" class="btn-me-logout">ADMIN</a>
                            @endif
                            <a href="/settings" class="btn-me-logout">Paramètre</a>
                            <button type="submit" class="btn-me-logout">Déconnexion</button>
     
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ url('/login') }}" class="btn btn-ghost">Connexion</a>
                <a href="{{ url('/register') }}" class="btn btn-primary">S'inscrire</a>
            @endauth
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-logo">Try<span>Anime</span></div>
        <div class="footer-text">© 2025 TryAnime — Projet Laravel Personnel</div>
        <div class="footer-links">
            <a href="{{ url('/about') }}">À propos</a>
            <a href="">Contact</a>
            <a href="{{ url('/cgu') }}">CGU</a>
        </div>
    </footer>

</body>

</html>