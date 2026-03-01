<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TendancesController extends Controller
{
public function tendances()
    {
        return view('pages.tendances',["currentPage" => "tendances"]);
    }
}
