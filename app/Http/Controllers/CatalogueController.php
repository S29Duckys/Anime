<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function catalogue() {
        $anime = DB::table('info_anime')->paginate(12);
        $totalPage = $anime->lastPage();
        return view('pages.catalogue',["currentPage" => "catalogue",'catalogueAnime' => $anime,'totalPage' => $totalPage]);
    } 
}
