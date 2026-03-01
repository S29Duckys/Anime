<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAnime;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
      public function index()
    {
        $animes = InfoAnime::lastFive()->get();
        $count = $animes->count();

        return view('pages.accueil', [
            'nmb' => 0,
            'getAnime' => $animes,
            'countAnime' => $count
        ]);
    }

    public function getAnimeByTitle($title)
    {
        $anime = InfoAnime::where('title', $title)->first();

        if (!$anime) {
            abort(404, 'Anime non trouvé');
        }

        return view('pages.anime-detail', [
            'anime' => $anime
        ]);
    }
}
