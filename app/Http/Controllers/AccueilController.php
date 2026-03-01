<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAnime;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
     public function index()
    {
        $anime = InfoAnime::lastFive()->get();
        $count = $anime->count();
        return view('pages.accueil', [
            'nmb' => 0,
            'getAnime' => $anime,
            'countAnime' => $count
            ]);
    }
}
