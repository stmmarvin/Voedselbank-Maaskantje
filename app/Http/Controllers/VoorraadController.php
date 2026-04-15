<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoorraadController extends Controller
{
    public function index()
    {
        $voorraad = DB::table('Voorraad')->get();
        return view('voorraad.index', compact('voorraad'));
    }

    public function create()
    {
        return view('voorraad.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Leverancier_Id' => 'required|integer',
            'Streepjescode' => 'required|string|max:50',
            'ProductNaam' => 'required|string|max:100',
            'Categorie' => 'required|string|max:100',
            'Aantal' => 'required|integer',
        ]);
        DB::table('Voorraad')->insert($validated);
        return redirect()->route('voorraad.index')->with('status', 'Product toegevoegd aan voorraad.');
    }

    public function edit($id)
    {
        $item = DB::table('Voorraad')->where('Id', $id)->first();
        return view('voorraad.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Leverancier_Id' => 'required|integer',
            'Streepjescode' => 'required|string|max:50',
            'ProductNaam' => 'required|string|max:100',
            'Categorie' => 'required|string|max:100',
            'Aantal' => 'required|integer',
        ]);
        DB::table('Voorraad')->where('Id', $id)->update($validated);
        return redirect()->route('voorraad.index')->with('status', 'Voorraad bijgewerkt.');
    }

    public function destroy($id)
    {
        DB::table('Voorraad')->where('Id', $id)->delete();
        return redirect()->route('voorraad.index')->with('status', 'Product verwijderd uit voorraad.');
    }
}
