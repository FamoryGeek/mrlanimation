<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Visiteur\Auth\LoginController;
use App\Http\Controllers\Visiteur\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('admin.dashboard');
    });
    Route::controller(ProfilController::class)->group(function(){
        Route::get('profil','index')->name('admin.profil');
        Route::post('profil','updateProfile')->name('admin.profil');
        Route::post('profil-avatar','updateAvatar')->name('admin.avatar');
    });
});

// Authentification Visiteur
Route::controller(LoginController::class)->group(function(){
    Route::get('visiteur/login','index')->name('visiteur.index');
    Route::post('visiteur/login','login')->name('visiteur.login');
    Route::post('visiteur/logout','logout')->name('visiteur.logout');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('visiteur/register','index')->name('visiteur.index');
    Route::post('visiteur/register','register')->name('visiteur.register');
});

Route::prefix('visiteur')->middleware('auth:visiteur')->group(function(){

    Route::controller(\App\Http\Controllers\Visiteur\DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('visiteur.dashboard');
    });
});
