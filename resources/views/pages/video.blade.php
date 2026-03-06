@extends('layouts.app')

@section('title', 'Demon Slayer — Épisode 19')

@section('content')
<div class="video-page">

    {{-- ── Breadcrumb ── --}}
    <div class="cat-breadcrumb">
        <a href="{{ url('/catalogue') }}">Catalogue</a>
        <span class="sep">/</span>
        <a href="#">Demon Slayer</a>
        <span class="sep">/</span>
        <a href="#">Saison 1</a>
        <span class="sep">/</span>
        <span class="current">Épisode 19 — Hinokami</span>
    </div>

    {{-- ── Main grid ── --}}
    <div class="vp-grid">

        {{-- ════════════════ LECTEUR ════════════════ --}}
        <div class="vp-left">

            <div class="vp-wrap is-paused" id="vpWrap">

                {{-- Titre overlay --}}
                <div class="vp-overlay-title">
                    Saison 1 · Épisode 19 — Hinokami
                </div>

                {{-- Spinner --}}
                <div class="vp-spinner" id="vpSpinner">
                    <div class="vp-spinner-ring"></div>
                </div>

                {{-- Bouton play centré --}}
                <div class="vp-center-play">
                    <div class="vp-center-btn" id="vpCenterBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>

                {{-- Vidéo — remplace le src par ton vrai chemin MP4 --}}
                <video id="vpVideo" preload="metadata">
                  <source src="{{ route('video.stream', [
                    'name'   => $anime->slug,
                    'saison' => $animeInfo['saison'],
                    'slug'   => $animeInfo['currentEpisode']['file'],
]) }}" type="video/mp4">

                    Votre navigateur ne supporte pas la lecture vidéo.
                </video>

                {{-- Contrôles --}}
                <div class="vp-controls" id="vpControls">

                    {{-- Barre de progression --}}
                    <div class="vp-progress-row">
                        <span class="vp-time" id="vpTimeCurrent">0:00</span>
                        <div class="vp-progress-track">
                            <div class="vp-progress-buffer" id="vpBuffer" style="width:0%"></div>
                            <div class="vp-progress-fill"  id="vpFill"   style="width:0%"></div>
                            <div class="vp-progress-thumb" id="vpThumb"  style="left:0%"></div>
                            <input type="range" id="vpProgressInput" min="0" max="100" value="0" step="0.01">
                        </div>
                        <span class="vp-time" id="vpTimeDuration">24:00</span>
                    </div>

                    {{-- Boutons --}}
                    <div class="vp-controls-row">

                        {{-- Play / Pause --}}
                        <button class="vp-btn" id="vpBtnPlay" title="Lecture / Pause (Espace)">
                            <svg id="vpIconPlay" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <svg id="vpIconPause" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" style="display:none">
                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                            </svg>
                        </button>

                        {{-- −10s --}}
                        <button class="vp-btn" id="vpBtnRewind" title="−10s (←)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"/>
                            </svg>
                        </button>

                        {{-- +10s --}}
                        <button class="vp-btn" id="vpBtnForward" title="+10s (→)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z"/>
                            </svg>
                        </button>

                        {{-- Volume --}}
                        <div class="vp-volume-group">
                            <button class="vp-btn" id="vpBtnMute" title="Muet (m)">
                                <svg id="vpIconVol" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 010 7.072M12 6.253v11.494m0 0l-4-3H5a1 1 0 01-1-1V10a1 1 0 011-1h3l4-3z"/>
                                </svg>
                                <svg id="vpIconMute" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15zM17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/>
                                </svg>
                            </button>
                            <div class="vp-volume-slider">
                                <input type="range" id="vpVolume" min="0" max="1" step="0.01" value="1">
                            </div>
                        </div>

                        <div class="vp-spacer"></div>

                        {{-- Vitesse --}}
                        <button class="vp-speed-badge" id="vpBtnSpeed">1×</button>

                        {{-- PiP --}}
                        <button class="vp-btn" id="vpBtnPip" title="Picture-in-Picture">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                            </svg>
                        </button>

                        {{-- Plein écran --}}
                        <button class="vp-btn" id="vpBtnFull" title="Plein écran (f)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                            </svg>
                        </button>

                    </div>
                </div>
            </div>{{-- /vp-wrap --}}

            {{-- ── Barre méta épisode ── --}}
            <div class="vp-ep-bar">
                <div class="vp-ep-info">
                    <h1 class="vp-ep-title">Épisode 19 — Hinokami</h1>
                    <div class="vp-ep-badges">
                        <span class="vp-badge vp-badge-season">Saison 1</span>
                        <span class="vp-badge vp-badge-num">Épisode 19</span>
                        <span class="vp-badge vp-badge-dur">24 min</span>
                    </div>
                </div>
                <div class="vp-nav-btns">
                    <a href="#" class="vp-nav-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Précédent
                    </a>
                    <a href="#" class="vp-nav-btn vp-nav-btn--primary">
                        Suivant
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>{{-- /vp-left --}}

        {{-- ════════════════ SIDEBAR ════════════════ --}}
        <aside class="vp-sidebar">

            {{-- Mini-card anime --}}
            <a href="#" class="vp-anime-card">
                <div class="vp-anime-thumb">
                    <img src="https://cdn.myanimelist.net/images/anime/1286/99889.jpg" alt="Demon Slayer">
                </div>
                <div class="vp-anime-meta">
                    <div class="vp-anime-name">Demon Slayer</div>
                    <div class="vp-anime-sub">Kimetsu no Yaiba</div>
                    <div class="vp-anime-sub" style="margin-top:4px;">26 épisodes · 2019</div>
                </div>
            </a>

            {{-- Sélecteur de saison --}}
            <div>
                <div class="vp-section-head">
                    <span class="vp-section-title">SAISON</span>
                    <div class="vp-section-line"></div>
                </div>
                <div class="vp-select-wrap">
                    <select class="vp-select">
                        <option selected>Saison 1 — Tanjiro Kamado Arc</option>
                        <option>Saison 2 — Entertainment District Arc</option>
                        <option>Saison 3 — Swordsmith Village Arc</option>
                    </select>
                    <div class="vp-select-chevron">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Playlist --}}
            <div>
                <div class="vp-section-head">
                    <span class="vp-section-title">ÉPISODES</span>
                    <div class="vp-section-line"></div>
                </div>

                @php
                $episodes = [
                    [ 'num' =>  1, 'title' => 'Cruelty',                          'watched' => true  ],
                    [ 'num' =>  2, 'title' => 'Trainer Sakonji Urokodaki',         'watched' => true  ],
                    [ 'num' =>  3, 'title' => 'Sabito and Makomo',                 'watched' => true  ],
                    [ 'num' =>  4, 'title' => 'Final Selection',                   'watched' => true  ],
                    [ 'num' =>  5, 'title' => 'My Own Steel',                      'watched' => false ],
                    [ 'num' =>  6, 'title' => 'Swordsman Accompanying a Demon',    'watched' => false ],
                    [ 'num' =>  7, 'title' => 'Muzan Kibutsuji',                   'watched' => false ],
                    [ 'num' =>  8, 'title' => 'The Smell of Enchanting Blood',     'watched' => false ],
                    [ 'num' =>  9, 'title' => 'Temari Demon and Arrow Demon',      'watched' => false ],
                    [ 'num' => 10, 'title' => 'Together Forever',                  'watched' => false ],
                    [ 'num' => 11, 'title' => 'Tsuzumi Mansion',                   'watched' => false ],
                    [ 'num' => 12, 'title' => 'The Boar Bares Its Fangs',          'watched' => false ],
                    [ 'num' => 13, 'title' => 'Something More Important',          'watched' => false ],
                    [ 'num' => 14, 'title' => 'The House with the Wisteria Crest', 'watched' => false ],
                    [ 'num' => 15, 'title' => 'Mount Natagumo',                    'watched' => false ],
                    [ 'num' => 16, 'title' => 'Letting Someone Else Go First',     'watched' => false ],
                    [ 'num' => 17, 'title' => 'You Must Master a Single Thing',    'watched' => false ],
                    [ 'num' => 18, 'title' => 'A Forged Bond',                     'watched' => false ],
                    [ 'num' => 19, 'title' => 'Hinokami',                          'watched' => false ],
                    [ 'num' => 20, 'title' => 'Pretend Family',                    'watched' => false ],
                    [ 'num' => 21, 'title' => 'Against Corps Rules',               'watched' => false ],
                    [ 'num' => 22, 'title' => 'Master of the Mansion',             'watched' => false ],
                    [ 'num' => 23, 'title' => 'Hashira Meeting',                   'watched' => false ],
                    [ 'num' => 24, 'title' => 'Rehabilitation Training',           'watched' => false ],
                    [ 'num' => 25, 'title' => 'Tsuguko, Kanao Tsuyuri',            'watched' => false ],
                    [ 'num' => 26, 'title' => 'New Mission',                       'watched' => false ],
                ];
                $currentEp = 19;
                @endphp

                <div class="vp-playlist" id="vpPlaylist">
                    @foreach($episodes as $ep)
                    @php $isActive = $ep['num'] === $currentEp; @endphp
                    <a href="#"
                       class="vp-pl-item {{ $isActive ? 'is-active' : '' }} {{ $ep['watched'] ? 'is-watched' : '' }}">

                        <div class="vp-pl-thumb">
                            <img src="https://cdn.myanimelist.net/images/anime/1286/99889.jpg" alt="">
                            @if($isActive)
                            <div class="vp-pl-bars">
                                <span></span><span></span><span></span>
                            </div>
                            @endif
                        </div>

                        <div class="vp-pl-info">
                            <span class="vp-pl-num">ÉP. {{ str_pad($ep['num'], 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="vp-pl-title">{{ $ep['title'] }}</span>
                            <span class="vp-pl-dur">24 min</span>
                        </div>

                        @if($ep['watched'])
                        <div class="vp-pl-check">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        @endif

                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Raccourcis clavier --}}
            <div class="vp-shortcuts">
                <div class="vp-shortcut"><kbd>Espace</kbd> Lecture / Pause</div>
                <div class="vp-shortcut"><kbd>←</kbd><kbd>→</kbd> ±10 secondes</div>
                <div class="vp-shortcut"><kbd>F</kbd> Plein écran</div>
                <div class="vp-shortcut"><kbd>M</kbd> Muet</div>
            </div>

        </aside>
    </div>{{-- /vp-grid --}}

</div>{{-- /video-page --}}



@endsection
@push("vite")
    @vite(['resources/js/pages/video.js','resources/css/pages/video.js'])
@endpush