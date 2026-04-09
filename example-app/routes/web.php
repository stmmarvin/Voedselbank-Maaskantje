<?php

use App\Http\Controllers\LeverancierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LeverancierController::class, 'index']);

Route::resource('leveranciers', LeverancierController::class);
