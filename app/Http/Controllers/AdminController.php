<?php

namespace App\Http\Controllers;

use App\Models\InfoAnime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $animes = InfoAnime::paginate(5);
        $countAnimes = $animes->total();
        $countUsers = $users->total();
        return view('admin.dashboard', ['users' => $users, 'countUsers' => $countUsers, 'countAnimes' => $countUsers]);
    }
    public function users()
    {
        $users = User::paginate(20);
        $countUsers = $users->total();
        return view('admin.user', ['users' => $users, 'countUsers' => $countUsers]);
    }
}
