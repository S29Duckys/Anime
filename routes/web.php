<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UsersController; 

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

Route::post('/register', [UsersController::class, 'store']);

Route::post('/login', [UsersController::class, 'login']);
