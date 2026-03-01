<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InfoAnime;

class CatalogueController extends Controller
{
    public function catalogue() {
        $anime = InfoAnime::paginate(12);
        return view('pages.catalogue', [
            'currentPage' => 'catalogue',
            'catalogueAnime' => $anime,
            'totalPage' => $anime->lastPage(),
            ]);
        }
}
