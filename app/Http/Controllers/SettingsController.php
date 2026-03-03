<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class SettingsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $animes = $user->animeList()->latest('user_anime_list.created_at')->get()->count();
        return view('pages.settings',['user' => $user,'animeMaListe' => $animes]);
    }

  public function UpdateProfil(Request $request)
{
    $user = auth()->user();
    $validatedData = $request->validate([
        'pseudo' => 'required|string|max:20|unique:users,pseudo,' . $user->id,
        'email' => 'required|string|email|max:50|unique:users,email,' . $user->id,
        'bio' => 'nullable|string|max:200',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    $user->pseudo = $validatedData['pseudo'];
    $user->email = $validatedData['email'];
    $user->bio = $validatedData['bio'] ?? $user->bio;
  if (isset($validatedData['avatar'])) {
    $file = $validatedData['avatar'];
    $imageName = uniqid('avatar_', true) . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->put('avatars/' . $imageName, file_get_contents($file));
    $user->avatar = 'avatars/' . $imageName;
}
    $user->save();
    if ($request->wantsJson()) {
        return response()->json([
            'message' => 'Profil mis à jour avec succès',
            'user' => $user
        ], 200);
    }
    return redirect()->back()->with('success', 'Profil mis à jour avec succès');
}
}
