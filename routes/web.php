<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\VoorraadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('leveranciers', LeverancierController::class);

// Voorraad routes
Route::get('/voorraad', [VoorraadController::class, 'index'])->name('overzicht');
Route::get('/voorraad/toevoegen', [VoorraadController::class, 'create'])->name('toevoegen');
Route::post('/voorraad/toevoegen', [VoorraadController::class, 'store'])->name('voorraad.store');
Route::get('/voorraad/bewerken/{id}', [VoorraadController::class, 'edit'])->name('bewerken');
Route::post('/voorraad/bewerken/{id}', [VoorraadController::class, 'update'])->name('voorraad.update');
Route::get('/voorraad/verwijderen/{id}', [VoorraadController::class, 'destroy'])->name('verwijderen');

// Klant dashboard
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/gebruikers', [AdminController::class, 'gebruikers'])->name('gebruikers');
    Route::get('/gebruikers/{id}/edit', [AdminController::class, 'edit'])->name('gebruikers.edit');
    Route::put('/gebruikers/{id}', [AdminController::class, 'update'])->name('gebruikers.update');
    Route::delete('/gebruikers/{id}', [AdminController::class, 'destroy'])->name('gebruikers.destroy');
});

require __DIR__.'/auth.php';
