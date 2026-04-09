<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voorraad;
use App\Models\Leverancier;

class VoorraadController extends Controller
{
    public function index()
    {
        $voorraad = Voorraad::with('leverancier')->get();
        return view('overzicht', compact('voorraad'));
    }
    
    public function create()
    {
        $leveranciers = Leverancier::all();
        return view('toevoegen', compact('leveranciers'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_naam' => 'required|string|max:100',
            'categorie' => 'required|string|max:100',
            'aantal' => 'required|integer|min:0',
            'streepjescode' => 'required|string|max:50|unique:voorraad,streepjescode'
        ]);
        
        Voorraad::create([
            'leverancier_id' => 1, // Standaard leverancier
            'streepjescode' => $request->streepjescode,
            'product_naam' => $request->product_naam,
            'categorie' => $request->categorie,
            'aantal' => $request->aantal
        ]);
        
        return redirect()->route('overzicht')->with('success', 'Product toegevoegd!');
    }
    
    public function edit($id)
    {
        $product = Voorraad::findOrFail($id);
        return view('bewerken', compact('product'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_naam' => 'required|string|max:100',
            'categorie' => 'required|string|max:100',
            'aantal' => 'required|integer|min:0'
        ]);
        
        $product = Voorraad::findOrFail($id);
        $product->update([
            'product_naam' => $request->product_naam,
            'categorie' => $request->categorie,
            'aantal' => $request->aantal
        ]);
        
        return redirect()->route('overzicht')->with('success', 'Product bijgewerkt!');
    }
    
    public function destroy($id)
    {
        $product = Voorraad::findOrFail($id);
        $product->delete();
        
        return redirect()->route('overzicht')->with('success', 'Product verwijderd!');
    }
}
