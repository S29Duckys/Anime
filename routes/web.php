<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\TendancesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SaisonsController;
use App\Http\Controllers\MalisteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\SettingsController;


Route::get('/cgu', function () {
    return view('pages.CGU');
})->name('cgu');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::controller(UsersController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});


Route::get('/anime/{slug}', [AnimeController::class, 'show'])->name('show');
Route::get('/catalogue', [CatalogueController::class, 'catalogue'])->name('catalogue');
Route::get('/tendances', [TendancesController::class, 'tendances'])->name('tendances');
Route::get('/genres', [GenreController::class, 'genres'])->name('genres');
Route::get('/saisons', [SaisonsController::class, 'saisons'])->name('saisons');
Route::get('/maliste', [MalisteController::class, 'maliste'])->name('maliste');
Route::middleware(['auth'])->group(function () {
    Route::post('/maliste', [MalisteController::class, 'store'])->name('maliste.store');
    Route::put('/maliste/{id}', [MalisteController::class, 'update'])->name('maliste.update');
    Route::delete('/maliste/{id}', [MalisteController::class, 'destroy'])->name('maliste.destroy');
});
Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/',      [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});

Route::get('/search/all', [CatalogueController::class, 'cataloguePage']);
Route::get('/search/{query}', [CatalogueController::class, 'searchBar']);

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.home');
Route::post('/settings/profile/udpate', [SettingsController::class, 'UpdateProfil'])->name('setting.profil');
