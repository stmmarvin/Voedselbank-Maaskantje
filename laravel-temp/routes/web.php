<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'allergie-overzicht');
Route::view('/allergie-overzicht', 'allergie-overzicht')->name('allergie.overzicht');
Route::view('/allergie-toevoegen', 'allergie-toevoegen')->name('allergie.toevoegen');
Route::view('/allergie-bewerken', 'allergie-bewerken')->name('allergie.bewerken');
