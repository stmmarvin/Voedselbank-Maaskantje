<?php

namespace App\Http\Controllers;

use App\Models\Inlog;
use App\Models\Klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function gebruikers()
    {
        $gebruikers = Inlog::with('klant')->orderBy('Id', 'desc')->paginate(20);
        
        return view('admin.gebruikers', compact('gebruikers'));
    }

    public function edit($id)
    {
        $gebruiker = Inlog::with('klant')->findOrFail($id);
        
        return view('admin.edit-gebruiker', compact('gebruiker'));
    }

    public function update(Request $request, $id)
    {
        $gebruiker = Inlog::findOrFail($id);
        
        $validated = $request->validate([
            'Email' => 'required|email|unique:Inlog,Email,' . $id . ',Id',
            'Rol' => 'required|in:klant,admin',
            'GezinsNaam' => 'nullable|string|max:100',
            'Adres' => 'nullable|string|max:255',
            'Telefoon' => 'nullable|string|max:15',
            'Wachtwoord' => 'nullable|min:6',
        ]);

        // Update Inlog
        $gebruiker->Email = $validated['Email'];
        $gebruiker->Rol = $validated['Rol'];
        
        if (!empty($validated['Wachtwoord'])) {
            $gebruiker->Wachtwoord = Hash::make($validated['Wachtwoord']);
        }
        
        $gebruiker->save();

        // Update Klant if exists
        if ($gebruiker->klant && $validated['Rol'] === 'klant') {
            $gebruiker->klant->GezinsNaam = $validated['GezinsNaam'] ?? $gebruiker->klant->GezinsNaam;
            $gebruiker->klant->Adres = $validated['Adres'] ?? $gebruiker->klant->Adres;
            $gebruiker->klant->Telefoon = $validated['Telefoon'];
            $gebruiker->klant->Email = $validated['Email'];
            $gebruiker->klant->save();
        }

        return redirect()->route('admin.gebruikers')->with('success', 'Gebruiker succesvol bijgewerkt!');
    }

    public function destroy($id)
    {
        $gebruiker = Inlog::findOrFail($id);
        
        // Prevent deleting yourself
        if ($gebruiker->Id === auth()->id()) {
            return redirect()->route('admin.gebruikers')->with('error', 'Je kunt jezelf niet verwijderen!');
        }

        // Delete related Klant first if exists
        if ($gebruiker->klant) {
            $gebruiker->klant->delete();
        }

        $gebruiker->delete();

        return redirect()->route('admin.gebruikers')->with('success', 'Gebruiker succesvol verwijderd!');
    }
}

