@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Nieuw product toevoegen</h1>
    <form method="POST" action="{{ route('voorraad.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Leverancier ID</label>
            <input type="number" name="Leverancier_Id" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Streepjescode</label>
            <input type="text" name="Streepjescode" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Productnaam</label>
            <input type="text" name="ProductNaam" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Categorie</label>
            <input type="text" name="Categorie" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Aantal</label>
            <input type="number" name="Aantal" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded">Opslaan</button>
        <a href="{{ route('voorraad.index') }}" class="ml-2 text-orange-600 underline">Annuleren</a>
    </form>
</div>
@endsection
