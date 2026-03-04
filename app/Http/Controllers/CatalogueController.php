<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoAnime;
use App\Models\Genres;

class CatalogueController extends Controller
{
    /**
     * Page catalogue initiale (vue Blade)
     */
    public function catalogue(Request $request)
    {
        $anime = $this->buildQuery($request)
            ->paginate(12)
            ->withQueryString();

        return view('pages.catalogue', $this->formatPagination($anime, $request));
    }

    /**
     * Endpoint JSON pour tout le catalogue (utilisé par JS)
     */
    public function cataloguePage(Request $request)
    {
        $anime = $this->buildQuery($request)
            ->paginate(12)
            ->withQueryString();

        return response()->json($this->formatPagination($anime, $request));
    }

    /**
     * Endpoint JSON pour recherche par titre
     */
    public function searchBar(Request $request, $query = null)
    {
        $anime = $this->buildQuery($request, $query)
            ->paginate(12)
            ->withQueryString();

        return response()->json($this->formatPagination($anime, $request));
    }

    /**
     * Construit la query selon le genre et le titre
     */
    private function buildQuery(Request $request, $search = null)
    {
        return InfoAnime::query()
            ->when($request->filled('genre'), function ($query) use ($request) {
                $query->whereJsonContains('genre', $request->input('genre'));
            })
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            });
    }

    /**
     * Formate la pagination et les données pour le front
     */
    private function formatPagination($anime, Request $request): array
    {
        $genres = Genres::paginate(5);
        return [
            'totalPage'              => $anime->count(),
            'countPerPage'           => $anime->perPage(),
            'currentView'            => 'catalogue',
            'catalogueAnime'         => $anime->items(),
            'currentPagePagination'            => $anime->currentPage(),
            'totalPages'             => $anime->lastPage(),
            'firstPageUrl'           => $anime->url(1),
            'nextPage'            => $anime->nextPageUrl(),
            'prevPage'            => $anime->previousPageUrl(),
            'activeGenre'            => $request->genre,
            'searchValue'            => $request->searchBar ?? $request->route('query'),
            'genres'                => $genres
        ];
    }
}
