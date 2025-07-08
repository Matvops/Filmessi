<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use App\Http\Middleware\UserIsAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('store');
    Route::get('/email_confirmation/{token}', [AuthController::class, 'email_confirmation'])->name('email_confirmation');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
    Route::post('/favorite', [FavoriteController::class, 'favoriteFilm'])->name('favorite');
    Route::get('/show_favorites', [FavoriteController::class, 'showFavorites'])->name('favorites');
    Route::get('/show/{token}', [FilmController::class, 'show'])->name('show');
});

Route::middleware(['auth', UserIsAdmin::class])->group(function() {
    Route::get('/panel', [PanelController::class, 'panel'])->name('panel');
    Route::get('/register_film', [PanelController::class, 'register'])->name('register_film');
    Route::post('/register_film', [FilmController::class, 'register'])->name('store_film');
    Route::get('/update_film/{token}', [PanelController::class, 'update'])->name('update_view_film');
    Route::post('/update_film', [FilmController::class, 'update'])->name('update_film');
});
    
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');

