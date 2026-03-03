<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaisonsController extends Controller
{
    public function saisons()
    {
        
        return view('pages.saisons',["currentPage" => "saisons"],);
    }
}
