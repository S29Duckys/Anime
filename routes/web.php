<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $nmb = 0;

    return view('welcome', [
        'nmb' => $nmb
    ]);
});


Route::get('/register', function () {
    return view('/auth/register');
});

Route::get('/login', function () {
    return view('/auth/login');
});

Route::post('/register', function (Request $request) {
    return dd($request->all());
    return "hello";
});

Route::post('/login', function () {
    return "holla";
});
