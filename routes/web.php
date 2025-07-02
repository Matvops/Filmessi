<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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
    Route::get('/show/{token}', [MainController::class, 'showFilm'])->name('show');
    Route::post('/favorite', [MainController::class, 'favoriteFilm'])->name('favorite');
    Route::get('/show_favorites', [MainController::class, 'showFavorites'])->name('favorites');
});
    
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/register_film', 'register_film');
