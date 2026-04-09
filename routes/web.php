<?php

use Illuminate\Support\Facades\Route;

// Redirect root naar login
Route::get('/', fn() => redirect()->route('login'));

// Klant dashboard
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

// Admin dashboard
Route::get('/admin/dashboard', fn() => view('admin.dashboard'))
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

require __DIR__.'/auth.php';
