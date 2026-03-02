<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InfoAnime;

class CatalogueController extends Controller
{
    public function catalogue(Request $request)
    {
        $query = InfoAnime::query();

        if ($request->has('genre') && $request->genre !== '') {
            $query->where('genre', 'LIKE', '%' . $request->genre . '%');
        }

        $anime = $query->paginate(12)->withQueryString();

        return view('pages.catalogue', [
            'currentPage' => 'catalogue',
            'catalogueAnime' => $anime,
            'currentPagePagination' => $anime->currentPage(),
            'totalPage' => $anime->lastPage(),
            'nextPage' => $anime->previousPageUrl(),
            'prevPage' => $anime->previousPageUrl(),
            'firstItem' => $anime->url("1"),
            'activeGenre' => $request->genre,
        ]);
    }
}
