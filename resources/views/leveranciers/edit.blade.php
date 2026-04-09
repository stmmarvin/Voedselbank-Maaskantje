<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-8">
                <h2 class="text-xl font-bold text-orange-700">Leverancier Bewerken</h2>
                
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
                    <a href="{{ route('leveranciers.index') }}" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-purple-50 text-purple-700 text-sm font-medium hover:bg-purple-100 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Leveranciers
                    </a>
                </div>
            </div>

            @if(Auth::user()->Rol === 'admin')
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
                <span class="inline-block px-3 py-1 bg-purple-100 text-purple-700 text-xs font-bold rounded-full uppercase mb-3">Beheer</span>
                <h1 class="text-3xl font-bold text-gray-900 mb-3">Leverancier bewerken</h1>
                <p class="text-gray-600 mb-6">
                    Pas de gegevens van <strong>{{ $leverancier->bedrijfsnaam }}</strong> aan.
                </p>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-lg">
                        <strong>Let op:</strong> Controleer de ingevoerde gegevens
                    </div>
                @endif

                <form method="POST" action="{{ route('leveranciers.update', $leverancier) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="bedrijfsnaam" class="block text-sm font-bold text-gray-700 mb-2">Bedrijfsnaam *</label>
                            <input
                                id="bedrijfsnaam"
                                name="bedrijfsnaam"
                                type="text"
                                value="{{ old('bedrijfsnaam', $leverancier->bedrijfsnaam) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('bedrijfsnaam') border-red-400 @enderror"
                            >
                            @error('bedrijfsnaam')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_naam" class="block text-sm font-bold text-gray-700 mb-2">Contactpersoon *</label>
                            <input
                                id="contact_naam"
                                name="contact_naam"
                                type="text"
                                value="{{ old('contact_naam', $leverancier->contact_naam) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('contact_naam') border-red-400 @enderror"
                            >
                            @error('contact_naam')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="telefoon" class="block text-sm font-bold text-gray-700 mb-2">Telefoon</label>
                            <input
                                id="telefoon"
                                name="telefoon"
                                type="text"
                                value="{{ old('telefoon', $leverancier->telefoon) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('telefoon') border-red-400 @enderror"
                            >
                            @error('telefoon')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="contact_email" class="block text-sm font-bold text-gray-700 mb-2">Email *</label>
                            <input
                                id="contact_email"
                                name="contact_email"
                                type="email"
                                value="{{ old('contact_email', $leverancier->contact_email) }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('contact_email') border-red-400 @enderror"
                            >
                            @error('contact_email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="adres" class="block text-sm font-bold text-gray-700 mb-2">Adres *</label>
                            <textarea
                                id="adres"
                                name="adres"
                                required
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('adres') border-red-400 @enderror"
                            >{{ old('adres', $leverancier->adres) }}</textarea>
                            @error('adres')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="eerstvolgende_levering" class="block text-sm font-bold text-gray-700 mb-2">Eerstvolgende levering</label>
                            <input
                                id="eerstvolgende_levering"
                                name="eerstvolgende_levering"
                                type="datetime-local"
                                value="{{ old('eerstvolgende_levering', $leverancier->eerstvolgende_levering?->format('Y-m-d\TH:i')) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition @error('eerstvolgende_levering') border-red-400 @enderror"
                            >
                            @error('eerstvolgende_levering')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-3 pt-4">
                        <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-bold transition shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Wijzigingen opslaan
                        </button>
                        <a href="{{ route('leveranciers.index') }}" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold transition">
                            Terug naar overzicht
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
