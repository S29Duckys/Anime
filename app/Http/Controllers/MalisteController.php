<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MalisteController extends Controller
{
    public function maliste() {
        return view('pages.maliste');
    }
}
