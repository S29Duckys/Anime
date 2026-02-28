<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\TendancesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SaisonsController;
use App\Http\Controllers\MalisteController;

Route::get('/', function () {
    return view('pages.accueil', ['nmb' => 0]);
})->name('accueil');

Route::controller(UsersController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');

    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');

    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(CatalogueController::class)->group(function () {
    Route::get('/catalogue', 'catalogue')->name('catalogue');
});

Route::controller(TendancesController::class)->group(function () {
    Route::get('/tendances', 'tendances')->name('tendances');
});

Route::controller(GenreController::class)->group(function() {
    Route::get('/genres', 'genres')->name('genres');
});

Route::controller(SaisonsController::class)->group(function() {
    Route::get('/saisons', 'saisons')->name('saisons');
});

Route::controller(MalisteController::class)->group(function() {
    Route::get('/maliste', 'maliste')->name('maliste');
});