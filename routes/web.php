<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\AllUserController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeContentController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Visiteur\Auth\LoginController;
use App\Http\Controllers\Admin\TypeSubscriptionController;
use App\Http\Controllers\Visiteur\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Visiteur\ProfilController as VisiteurProfilController;
use App\Models\Categorie;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::controller(HomeController::class)->group(function(){
    Route::get('interviews','interview')->name('interview');
    Route::get('podcasts','podcast')->name('podcast');
    Route::get('musiques','musique')->name('musique');
    Route::get('formations','formation')->name('formation');
    Route::get('about','about')->name('about');
    Route::get('contact','contact')->name('contact');
    Route::get('faq','faq')->name('faq');
    Route::get('terms','term')->name('term');
    Route::get('privacy','privacy')->name('privacy');
});



Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Route::prefix('admin')->middleware( ['auth'])->group(function(){

    Route::controller( DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('admin.dashboard');
    });

    Route::controller( ProfilController::class)->group(function(){
        Route::get('profil','index')->name('admin.profil');
        Route::post('profil','updateProfile')->name('admin.profil');
        Route::post('profil-avatar','updateAvatar')->name('admin.avatar');
    });

    Route::controller( TypeSubscriptionController::class)->group(function(){
        Route::get('types-subscription','index')->name('admin.types-subscription.show');
        Route::post('types-subscription/create','save')->name('admin.types-subscription.save');
        Route::put('types-subscription/update/{id}','update')->name('admin.types-subscription.update');
        Route::delete('types-subscription/delete/{id}','delete')->name('admin.types-subscription.delete');

    });

    Route::controller( SubscriptionController::class)->group(function(){
        Route::get('subscriptions','index')->name('admin.subscriptions');
    });

    Route::controller( TypeContentController::class)->group(function(){
        Route::get('types-content','index')->name('admin.types-content');
        Route::post('types-content/create','save')->name('admin.types-content.save');
        Route::put('types-content/update/{id}','update')->name('admin.types-content.update');
        Route::delete('types-content/delete/{id}','delete')->name('admin.types-content.delete');

    });

    Route::controller( CategorieController::class)->group(function(){
        Route::get('categories','index')->name('admin.categorie');
        Route::post('categorie/create','save')->name('admin.categorie.save');
        Route::put('categorie/update/{id}','update')->name('admin.categorie.update');
        Route::delete('categorie/delete/{id}','delete')->name('admin.categorie.delete');

    });

    Route::controller( ContentController::class)->group(function(){
        Route::get('contents','index')->name('admin.contents');
        Route::post('content/create','save')->name('admin.content.save');
        Route::put('content/update/{id}','update')->name('admin.content.update');
        Route::delete('content/delete/{id}','delete')->name('admin.content.delete');

    });

    Route::controller(AllUserController::class)->group(function(){
        Route::get('users','adminUsers')->name('admin.user');
        Route::post('users/save','adminUserSave')->name('admin.user.save');
        Route::put('users/update/{id}','adminUserUpdate')->name('admin.user.update');
        Route::delete('users/delete/{id}','adminUserDelete')->name('admin.user.delete');
        Route::get('visiteur','visiteurUsers')->name('admin.visiteur');
        Route::put('visiteur/lock/{id}','lock')->name('admin.visiteur.lock');
        Route::put('visiteur/unlock/{id}','unlock')->name('admin.visiteur.unlock');

    });

    Route::post('/newsletter/send', [NewsletterController::class, 'send'])->name('newsletter.send');



});

// Authentification Visiteur
Route::controller( LoginController::class)->group(function(){
    Route::get('visiteur/login','index')->name('visiteur.index');
    Route::post('visiteur/login','login')->name('visiteur.login');
    Route::post('visiteur/logout','logout')->name('visiteur.logout');
});

Route::controller( RegisterController::class)->group(function(){
    Route::get('visiteur/register','index')->name('visiteur.index');
    Route::post('visiteur/register','register')->name('visiteur.register');
});

Route::prefix( 'visiteur')->middleware( 'auth:visiteur')->group(function(){

    Route::controller( \App\Http\Controllers\Visiteur\DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('visiteur.dashboard');
    });

    Route::controller( VisiteurProfilController::class)->group(function(){
        Route::get('profil','index')->name('visiteur.profil');
        Route::post('profil','updateProfile')->name('visiteur.profil');
        Route::post('profil-avatar','updateAvatar')->name('visiteur.avatar');
    });
});
