<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\TendancesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SaisonsController;
use App\Http\Controllers\MalisteController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('pages.accueil', ['nmb' => 0]);
})->name('accueil');

Route::get('/cgu', function () {
    return view('pages.CGU');
})->name('cgu');


Route::controller(UsersController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/settings','settings')->name('settings');
});

Route::get('/catalogue', [CatalogueController::class, 'catalogue'])->name('catalogue');
Route::get('/tendances', [TendancesController::class, 'tendances'])->name('tendances');
Route::get('/genres',[GenreController::class,'genres'])->name('genres');
Route::get('/saisons',[SaisonsController::class,'saisons'])->name('saisons');
Route::get('/maliste', [MalisteController::class, 'maliste'])->name('maliste');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/',      [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});
