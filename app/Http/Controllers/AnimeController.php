<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\InfoAnime;

class AnimeController extends Controller
{
public function show($slug) {
    $nameAnime = 'animes/' . $slug;

    if (!Storage::disk('public')->exists($nameAnime)) {
        return redirect()->back()->with('error', "Impossible de trouver les épisodes de l'animé !");
    }

    return view('pages.anime', [
        "anime"       => InfoAnime::findByTitle($slug),
        "animeFolder" => $this->getAllEpisodes($nameAnime)
    ]);
}

public function getAllEpisodes(string $nameAnime)
{
    $sousDossiers = Storage::disk('public')->directories($nameAnime);

    return [
        'nameAnime'   => $nameAnime,
        'underFolder' => $sousDossiers,
        'counts'      => count($sousDossiers)
    ];
}
}
