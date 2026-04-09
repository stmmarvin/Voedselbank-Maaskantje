@extends('layout')

@section('title', 'Voorraad Verwijderen')

@section('content')
    <h2>Voorraad Verwijderen</h2>
    
    <form>
        <div class="form-group">
            <label>Productnaam</label>
            <input type="text" name="productnaam">
        </div>
        
        <div class="form-group">
            <label>Categorie</label>
            <select name="categorie">
                <option>Selecteer categorie</option>
                <option>Groente</option>
                <option>Fruit</option>
                <option>Zuivel</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Aantal</label>
            <input type="number" name="aantal">
        </div>
        
        <div class="form-group">
            <label>Houdbaar tot</label>
            <input type="date" name="houdbaar_tot">
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn">Opslaan</button>
        </div>
    </form>
@endsection
