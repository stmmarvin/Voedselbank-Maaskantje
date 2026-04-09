@extends('layout')

@section('title', 'Voorraad Overzicht')

@section('content')
    <h2>Voorraad Overzicht</h2>
    
    <div class="search-bar">
        <input type="text" placeholder="Zoeken...">
        <button>Zoek</button>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Categorie</th>
                <th>Aantal</th>
                <th>Houdbaar tot</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Productnaam</td>
                <td>Categorie selecteren</td>
                <td>Aantal</td>
                <td>Houdbaar tot</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
    
    <div class="form-actions">
        <button class="btn" onclick="window.location='{{ route('toevoegen') }}'">Opslaan</button>
    </div>
    
    <div class="pagination">
        Vorige <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> Volgende
    </div>
@endsection
