<?php

use App\Http\Controllers\LeverancierController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/leveranciers');

Route::resource('leveranciers', LeverancierController::class);
