<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
});


Route::middleware('auth')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
});
    
Route::get('/home', [MainController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');;
