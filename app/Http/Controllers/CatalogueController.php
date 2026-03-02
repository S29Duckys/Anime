<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAnime;

class CatalogueController extends Controller
{
    public function catalogue(Request $request)
    {
        $anime = $this->buildQuery($request)
            ->paginate(12)
            ->withQueryString();

        return view('pages.catalogue', $this->formatPagination($anime, $request));
    }

    public function searchBar(Request $request)
    {
        $anime = $this->buildQuery($request)
            ->paginate(12)
            ->withQueryString();

        return $this->formatPagination($anime, $request);
    }

    private function buildQuery(Request $request)
    {
        return InfoAnime::query()
            ->when($request->filled('genre'), function ($query) use ($request) {
                $query->where('genre', 'LIKE', '%' . $request->genre . '%');
            })
            ->when($request->filled('searchBar'), function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->searchBar . '%');
            });
    }

    private function formatPagination($anime, Request $request)
    {
        return [
            'currentPage' => 'catalogue',
            'catalogueAnime' => $anime,
            'currentPagePagination' => $anime->currentPage(),
            'totalPage' => $anime->lastPage(),
            'nextPage' => $anime->nextPageUrl(),
            'prevPage' => $anime->previousPageUrl(),
            'firstItem' => $anime->url(1),
            'activeGenre' => $request->genre,
        ];
    }
}
