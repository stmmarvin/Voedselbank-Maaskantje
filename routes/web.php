<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Redirect root naar login
Route::get('/', fn() => redirect()->route('login'));

// Klant dashboard
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// Allergieën pagina
Route::get('/allergien', fn() => view('allergien'))
    ->middleware('auth')
    ->name('allergien');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/gebruikers', [AdminController::class, 'gebruikers'])->name('gebruikers');
    Route::get('/gebruikers/{id}/edit', [AdminController::class, 'edit'])->name('gebruikers.edit');
    Route::put('/gebruikers/{id}', [AdminController::class, 'update'])->name('gebruikers.update');
    Route::delete('/gebruikers/{id}', [AdminController::class, 'destroy'])->name('gebruikers.destroy');
});

require __DIR__.'/auth.php';
