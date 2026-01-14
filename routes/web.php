<?php

use App\Http\Controllers\NarudzbinaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\KorpaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProizvodController as AdminProizvodController;

// Pocetna
Route::get('/', function() 
{
    return view('home');
})->name('home');

Route::resource('proizvods', App\Http\Controllers\ProizvodController::class);

// Katalog
Route::get('/proizvodi', [ProizvodController::class, 'index'])->name('proizvods.index');

// Jedan proizvod
Route::get('/proizvod/{proizvod}', [ProizvodController::class, 'show'])->name('proizvod.show');

// Admin
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function() {
    Route::resource('proizvodi', AdminProizvodController::class);
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Narudzbine korisnika
    Route::resource('narudzbinas', App\Http\Controllers\NarudzbinaController::class);
    Route::resource('stavka-narudzbines', App\Http\Controllers\StavkaNarudzbineController::class);

    // Rute za korpu
    Route::post('/korpa/dodaj/{proizvod}', [KorpaController::class, 'dodaj'])->name('korpa.dodaj');
    Route::get('/korpa', [KorpaController::class, 'prikazi'])->name('korpa.prikazi');
    Route::post('/korpa/ukloni/{proizvod}', [KorpaController::class, 'ukloni'])->name('korpa.ukloni');


    
});

require __DIR__.'/auth.php';
