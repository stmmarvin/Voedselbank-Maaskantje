@extends('layout')

@section('title', 'Voorraad Bewerken')

@section('content')
    <h2>Voorraad Bewerken</h2>
    
    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('voorraad.update', $product->id) }}">
        @csrf
        
        <div class="form-group">
            <label>Productnaam</label>
            <input type="text" name="product_naam" value="{{ old('product_naam', $product->product_naam) }}" required>
        </div>
        
        <div class="form-group">
            <label>Categorie</label>
            <select name="categorie" required>
                <option value="">Selecteer categorie</option>
                <option value="Groente" {{ old('categorie', $product->categorie) == 'Groente' ? 'selected' : '' }}>Groente</option>
                <option value="Fruit" {{ old('categorie', $product->categorie) == 'Fruit' ? 'selected' : '' }}>Fruit</option>
                <option value="Zuivel" {{ old('categorie', $product->categorie) == 'Zuivel' ? 'selected' : '' }}>Zuivel</option>
                <option value="Vlees" {{ old('categorie', $product->categorie) == 'Vlees' ? 'selected' : '' }}>Vlees</option>
                <option value="Brood" {{ old('categorie', $product->categorie) == 'Brood' ? 'selected' : '' }}>Brood</option>
                <option value="Conserven" {{ old('categorie', $product->categorie) == 'Conserven' ? 'selected' : '' }}>Conserven</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Aantal</label>
            <input type="number" name="aantal" value="{{ old('aantal', $product->aantal) }}" min="0" required>
        </div>
        
        <div class="form-group">
            <label>Streepjescode</label>
            <input type="text" value="{{ $product->streepjescode }}" disabled style="background: #f0f0f0;">
            <small style="color: #666;">Streepjescode kan niet worden gewijzigd</small>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn">Opslaan</button>
            <button type="button" class="btn" style="background: #999;" onclick="window.location='{{ route('overzicht') }}'">Annuleren</button>
        </div>
    </form>
@endsection
