<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\UtilisateursController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/layout', function () {
    return view('layout');
});

// Routes d'inscription (publique, sans auth)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/paiement', [PaiementController::class, 'showForm'])->name('paiement.form');
Route::post('/paiement', [PaiementController::class, 'processPaiement'])->name('paiement.process');
Route::get('/paiement/success', [PaiementController::class, 'success'])->name('paiement.success');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/layout', function () {
        return view('layout');
    })->name('layout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('commentaires', CommentaireController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('langues', LangueController::class);
    Route::resource('utilisateurs', UtilisateursController::class);
    Route::resource('media', MediaController::class);
    Route::resource('contenus', ContenuController::class);
    Route::resource('typeContenu', TypeContenuController::class);
    Route::resource('typeMedia', TypeMediaController::class);
    Route::resource('region', RegionController::class);
});

require __DIR__.'/auth.php';
