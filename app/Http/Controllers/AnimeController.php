<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAnime;

class AnimeController extends Controller
{
public function show($slug) {
    $anime = InfoAnime::findByTitle($slug);
    return view('pages.anime', ["anime" => $anime]);
}
}
