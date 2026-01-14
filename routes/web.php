<?php

use App\Http\Controllers\NarudzbinaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\KorpaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProizvodController as AdminProizvodController;
use App\Http\Controllers\Admin\KategorijaController as AdminKategorijaController;
use App\Http\Controllers\Admin\NarudzbinaController as AdminNarudzbinaController;

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
    Route::resource('proizvodi', AdminProizvodController::class)->parameters(['proizvodi'=>'proizvod']);
    Route::resource('kategorije', AdminKategorijaController::class)->parameters(['kategorije'=>'kategorija']);
    Route::resource('narudzbine', AdminNarudzbinaController::class)->parameters(['narudzbine'=>'narudzbina']);
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
    Route::get('/narudzbinas', [NarudzbinaController::class, 'index'])->name('narudzbinas.index');
    Route::get('/narudzbinas/create', [NarudzbinaController::class, 'create'])->name('narudzbinas.create');
    Route::post('/narudzbinas', [NarudzbinaController::class, 'store'])->name('narudzbinas.store');
    Route::get('/narudzbinas/{narudzbina}', [NarudzbinaController::class, 'show'])->name('narudzbinas.show');


    // Rute za korpu
    Route::post('/korpa/dodaj/{proizvod}', [KorpaController::class, 'dodaj'])->name('korpa.dodaj');
    Route::get('/korpa', [KorpaController::class, 'prikazi'])->name('korpa.prikazi');
    Route::post('/korpa/ukloni/{proizvod}', [KorpaController::class, 'ukloni'])->name('korpa.ukloni');

});

require __DIR__.'/auth.php';
