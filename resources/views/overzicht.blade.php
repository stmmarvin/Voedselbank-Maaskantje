@extends('layout')

@section('title', 'Voorraad Overzicht')

@section('content')
    <h2>Voorraad Overzicht</h2>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="search-bar">
        <input type="text" placeholder="Zoeken..." id="searchInput">
        <button onclick="searchProducts()">Zoek</button>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Categorie</th>
                <th>Aantal</th>
                <th>Streepjescode</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody id="productTable">
            @forelse($voorraad as $product)
            <tr>
                <td>{{ $product->product_naam }}</td>
                <td>{{ $product->categorie }}</td>
                <td>{{ $product->aantal }}</td>
                <td>{{ $product->streepjescode }}</td>
                <td>
                    <a href="{{ route('bewerken', $product->id) }}" style="color: #ff6600; text-decoration: none; margin-right: 10px;">Bewerken</a>
                    <a href="{{ route('verwijderen', $product->id) }}" style="color: #ff6600; text-decoration: none;" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Verwijderen</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: #999;">Geen producten gevonden</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="form-actions">
        <button class="btn" onclick="window.location='{{ route('toevoegen') }}'">Nieuw Product</button>
    </div>
    
    <script>
        function searchProducts() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('#productTable tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        }
    </script>
@endsection
