<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-8">
                <h2 class="text-xl font-bold text-orange-700">Allergie Bewerken</h2>
                
                <!-- Tabjes rechts van de titel -->
                <div class="flex gap-3">
                    <a href="#" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 text-sm font-medium hover:bg-blue-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Informatie
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Voorraad
                    </a>
                    <a href="{{ route('allergie.overzicht') }}" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-50 text-red-700 text-sm font-medium hover:bg-red-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        Allergieën
                    </a>
                    <a href="#" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-purple-50 text-purple-700 text-sm font-medium hover:bg-purple-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Leveranciers
                    </a>
                </div>
            </div>

            @if(Auth::user()->Rol === 'admin')
                <!-- Admin Paneel knop rechts -->
                <a href="{{ route('admin.gebruikers') }}" class="flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Admin Paneel
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-lg p-8 border border-orange-100">
                <span class="inline-block px-3 py-1 bg-orange-100 text-orange-700 text-xs font-bold rounded-full uppercase mb-3">Beheer</span>
                <h1 class="text-3xl font-bold text-gray-900 mb-3">Allergie bewerken.</h1>
                <p class="text-gray-600 mb-6">Pas hier de naam of ernst van een bestaande allergie aan.</p>

                @if(!empty($editFormSuccess))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                        {{ $editFormSuccess }}
                    </div>
                @endif

                @if(!empty($editFormError))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                        {{ $editFormError }}
                    </div>
                @endif

                @if(empty($editAllergy))
                    <div class="p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                        Geen geldige allergie geselecteerd.
                    </div>
                @else
                    <form method="post" action="{{ route('allergie.bewerken') }}?id={{ $editAllergy['Id'] }}" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ $editAllergy['Id'] }}">

                        <div>
                            <label for="naam" class="block text-sm font-bold text-gray-700 mb-2">Naam van de allergie</label>
                            <input
                                id="naam"
                                name="naam"
                                type="text"
                                maxlength="100"
                                value="{{ $editAllergy['Naam'] ?? '' }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition"
                            >
                        </div>

                        <div>
                            <label for="ernst" class="block text-sm font-bold text-gray-700 mb-2">Ernst</label>
                            <select id="ernst" name="ernst" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition">
                                <option value="" {{ ($editAllergy['Ernst'] ?? '') === '' ? 'selected' : '' }}>Niet opgegeven</option>
                                <option value="Laag" {{ ($editAllergy['Ernst'] ?? '') === 'Laag' ? 'selected' : '' }}>Laag</option>
                                <option value="Gemiddeld" {{ ($editAllergy['Ernst'] ?? '') === 'Gemiddeld' ? 'selected' : '' }}>Gemiddeld</option>
                                <option value="Hoog" {{ ($editAllergy['Ernst'] ?? '') === 'Hoog' ? 'selected' : '' }}>Hoog</option>
                            </select>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-6 py-3 rounded-lg font-bold transition shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Wijzigingen opslaan
                            </button>
                            <a href="{{ route('allergie.overzicht') }}" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold transition">
                                Terug naar overzicht
                            </a>
                        </div>
                    </form>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
