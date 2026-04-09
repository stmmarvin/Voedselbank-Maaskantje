<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('overzicht');
})->name('overzicht');

Route::get('/toevoegen', function () {
    return view('toevoegen');
})->name('toevoegen');

Route::get('/verwijderen', function () {
    return view('verwijderen');
})->name('verwijderen');

Route::get('/bewerken', function () {
    return view('bewerken');
})->name('bewerken');
