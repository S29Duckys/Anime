<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function index()
    {
        $anime = DB::table('info_anime')->get();
        return view('pages.accueil',['nmb' => 0, 'getAnime' => $anime]);
    }
}
