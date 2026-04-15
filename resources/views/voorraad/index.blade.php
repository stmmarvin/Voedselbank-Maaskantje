@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Voorraad Overzicht</h1>
    @if(session('status'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('status') }}</div>
    @endif
    <a href="{{ route('voorraad.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded mb-4 inline-block">Nieuw product toevoegen</a>
    <table class="w-full border mt-4">
        <thead>
            <tr class="bg-orange-100">
                <th>ID</th>
                <th>Leverancier ID</th>
                <th>Streepjescode</th>
                <th>Productnaam</th>
                <th>Categorie</th>
                <th>Aantal</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voorraad as $item)
                <tr class="border-b">
                    <td>{{ $item->Id }}</td>
                    <td>{{ $item->Leverancier_Id }}</td>
                    <td>{{ $item->Streepjescode }}</td>
                    <td>{{ $item->ProductNaam }}</td>
                    <td>{{ $item->Categorie }}</td>
                    <td>{{ $item->Aantal }}</td>
                    <td>
                        <a href="{{ route('voorraad.edit', $item->Id) }}" class="text-blue-600 underline">Bewerken</a>
                        <form action="{{ route('voorraad.destroy', $item->Id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 underline ml-2" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
