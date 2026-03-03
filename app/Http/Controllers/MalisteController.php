<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MalisteController extends Controller
{
    public function maliste()
    {
        $animes = collect();

        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $animes = $user->animeList()->latest('user_anime_list.created_at')->get();
        }

        return view('pages.maliste', [
            'currentPage' => 'maliste',
            'animes' => $animes,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'info_anime_id' => 'required|exists:info_anime,id',
            'status' => 'in:watching,completed,planned',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->animeList()->where('info_anime_id', $request->info_anime_id)->exists()) {
            return back()->with('warning', 'Cet anime est déjà dans votre liste.');
        }

        $user->animeList()->attach($request->info_anime_id, [
            'id' => uniqid(),
            'status' => $request->status ?? 'planned',
            'progress' => 0,
        ]);

        return back()->with('success', 'Anime ajouté à votre liste !');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'in:watching,completed,planned',
            'progress' => 'integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->animeList()->updateExistingPivot($id, $request->only('status', 'progress', 'rating'));

        return back()->with('success', 'Liste mise à jour !');
    }

    public function destroy($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->animeList()->detach($id);

        return back()->with('success', 'Anime retiré de votre liste.');
    }
}
