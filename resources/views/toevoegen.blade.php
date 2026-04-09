@extends('layout')

@section('title', 'Voorraad Toevoegen')

@section('content')
    <h2>Voorraad Toevoegen</h2>
    
    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('voorraad.store') }}">
        @csrf
        
        <div class="form-group">
            <label>Productnaam</label>
            <input type="text" name="product_naam" value="{{ old('product_naam') }}" required>
        </div>
        
        <div class="form-group">
            <label>Categorie</label>
            <select name="categorie" required>
                <option value="">Selecteer categorie</option>
                <option value="Groente" {{ old('categorie') == 'Groente' ? 'selected' : '' }}>Groente</option>
                <option value="Fruit" {{ old('categorie') == 'Fruit' ? 'selected' : '' }}>Fruit</option>
                <option value="Zuivel" {{ old('categorie') == 'Zuivel' ? 'selected' : '' }}>Zuivel</option>
                <option value="Vlees" {{ old('categorie') == 'Vlees' ? 'selected' : '' }}>Vlees</option>
                <option value="Brood" {{ old('categorie') == 'Brood' ? 'selected' : '' }}>Brood</option>
                <option value="Conserven" {{ old('categorie') == 'Conserven' ? 'selected' : '' }}>Conserven</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Aantal</label>
            <input type="number" name="aantal" value="{{ old('aantal') }}" min="0" required>
        </div>
        
        <div class="form-group">
            <label>Streepjescode</label>
            <input type="text" name="streepjescode" value="{{ old('streepjescode') }}" required>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn">Opslaan</button>
            <button type="button" class="btn" style="background: #999;" onclick="window.location='{{ route('overzicht') }}'">Annuleren</button>
        </div>
    </form>
@endsection
