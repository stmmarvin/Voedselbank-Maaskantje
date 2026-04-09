<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoorraadController;

Route::get('/', [VoorraadController::class, 'index'])->name('overzicht');
Route::get('/toevoegen', [VoorraadController::class, 'create'])->name('toevoegen');
Route::post('/toevoegen', [VoorraadController::class, 'store'])->name('voorraad.store');
Route::get('/bewerken/{id}', [VoorraadController::class, 'edit'])->name('bewerken');
Route::post('/bewerken/{id}', [VoorraadController::class, 'update'])->name('voorraad.update');
Route::get('/verwijderen/{id}', [VoorraadController::class, 'destroy'])->name('verwijderen');
