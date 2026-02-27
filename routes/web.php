<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

    $validator = Validator::make($request->all(), [
        'pseudo' => 'required|string|max:255|unique:users',
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);
});

Route::post('/login', function () {
    return "holla";
});
