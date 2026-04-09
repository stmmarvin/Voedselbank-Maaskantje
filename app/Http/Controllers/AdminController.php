<?php

namespace App\Http\Controllers;

use App\Models\Inlog;
use App\Models\Klant;

class AdminController extends Controller
{
    public function gebruikers()
    {
        $gebruikers = Inlog::with('klant')->orderBy('Id', 'desc')->paginate(20);
        
        return view('admin.gebruikers', compact('gebruikers'));
    }
}
