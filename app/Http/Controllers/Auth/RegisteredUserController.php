<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Inlog;
use App\Models\Klant;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'GezinsNaam'  => ['required', 'string', 'max:100'],
            'Email'       => ['required', 'string', 'email', 'max:100', 'unique:Inlog,Email'],
            'Adres'       => ['required', 'string', 'max:255'],
            'Telefoon'    => ['nullable', 'string', 'max:15'],
            'Wachtwoord'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $inlog = Inlog::create([
            'Email'      => $request->Email,
            'Wachtwoord' => Hash::make($request->Wachtwoord),
            'Rol'        => 'klant',
        ]);

        Klant::create([
            'Inlog_Id'   => $inlog->Id,
            'GezinsNaam' => $request->GezinsNaam,
            'Adres'      => $request->Adres,
            'Telefoon'   => $request->Telefoon,
            'Email'      => $request->Email,
        ]);

        event(new Registered($inlog));
        Auth::login($inlog);

        return redirect()->route('dashboard');
    }
}
