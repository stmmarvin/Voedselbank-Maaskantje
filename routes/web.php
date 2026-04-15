<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Redirect root naar login
Route::get('/', fn() => redirect()->route('login'));

// Klant dashboard
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// Allergieën routes (voor klanten en admins)
Route::middleware('auth')->group(function () {
    Route::get('/allergie-overzicht', [App\Http\Controllers\AllergieController::class, 'overzicht'])->name('allergie.overzicht');
    Route::get('/allergie-toevoegen', [App\Http\Controllers\AllergieController::class, 'toevoegen'])->name('allergie.toevoegen');
    Route::post('/allergie-toevoegen', [App\Http\Controllers\AllergieController::class, 'toevoegen']);
    Route::get('/allergie-bewerken', [App\Http\Controllers\AllergieController::class, 'bewerken'])->name('allergie.bewerken');
    Route::post('/allergie-bewerken', [App\Http\Controllers\AllergieController::class, 'bewerken']);
    Route::post('/allergie-verwijderen', [App\Http\Controllers\AllergieController::class, 'verwijderen'])->name('allergie.verwijderen');
});

// Leveranciers routes (voor klanten en admins)
Route::middleware('auth')->group(function () {
    Route::resource('leveranciers', App\Http\Controllers\LeverancierController::class);
});

// Voorraad routes (voor klanten en admins)
Route::middleware('auth')->group(function () {
    Route::resource('voorraad', App\Http\Controllers\VoorraadController::class);
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/gebruikers', [AdminController::class, 'gebruikers'])->name('gebruikers');
    Route::get('/gebruikers/{id}/edit', [AdminController::class, 'edit'])->name('gebruikers.edit');
    Route::put('/gebruikers/{id}', [AdminController::class, 'update'])->name('gebruikers.update');
    Route::delete('/gebruikers/{id}', [AdminController::class, 'destroy'])->name('gebruikers.destroy');
});

require __DIR__.'/auth.php';
