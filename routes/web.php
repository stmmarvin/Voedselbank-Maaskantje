<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Redirect root naar login
Route::get('/', fn() => redirect()->route('login'));

// Klant dashboard
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    Route::get('/gebruikers', [AdminController::class, 'gebruikers'])->name('gebruikers');
});

require __DIR__.'/auth.php';
