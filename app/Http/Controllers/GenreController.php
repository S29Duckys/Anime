<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genres()
    {
        return view('pages.genres',["currentPage" => "genres"]);
    }
}
