<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-8">
            <h2 class="text-xl font-bold text-orange-700">Leveranciers Overzicht</h2>
            
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
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('status'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Hero Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-8 border border-orange-100">
                    <span class="inline-block px-3 py-1 bg-purple-100 text-purple-700 text-xs font-bold rounded-full uppercase mb-3">Beheer</span>
                    <h1 class="text-3xl font-bold text-gray-900 mb-3">Leveranciers overzicht</h1>
                    <p class="text-gray-600">
                        Beheer alle leveranciers die producten leveren aan de voedselbank. Houd bestellingen bij en bekijk leveringsstatussen.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white rounded-2xl shadow-lg p-6 border border-purple-100">
                    <h2 class="text-lg font-semibold text-purple-700 mb-2">Totaal</h2>
                    <p class="text-sm text-gray-600 mb-4">Aantal geregistreerde leveranciers</p>
                    <div class="inline-flex items-center px-4 py-2 bg-purple-100 text-purple-700 rounded-full font-bold text-2xl">
                        {{ $leveranciers->count() }}
                    </div>
                </div>
            </div>

            <!-- Search & Add -->
            <div class="bg-white rounded-2xl shadow-lg border border-orange-100 p-6 mb-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <form method="GET" action="{{ route('leveranciers.index') }}" class="flex-1 max-w-md">
                        <input
                            type="search"
                            name="zoek"
                            value="{{ $zoek }}"
                            placeholder="Zoek op naam, contact, email of adres..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                        >
                    </form>
                    <div class="flex gap-3">
                        @if(Auth::user()->Rol === 'admin')
                            <a href="{{ route('admin.gebruikers') }}" class="flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white px-4 py-3 rounded-lg font-semibold transition shadow-lg whitespace-nowrap">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Admin Paneel
                            </a>
                        @endif
                        <a href="{{ route('leveranciers.create') }}" class="flex items-center gap-2 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white px-4 py-3 rounded-lg font-semibold transition shadow-lg whitespace-nowrap">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Leverancier toevoegen
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-lg border border-orange-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-purple-50 border-b-2 border-purple-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-purple-900 uppercase tracking-wider">Bedrijfsnaam</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-purple-900 uppercase tracking-wider">Contact</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-purple-900 uppercase tracking-wider">Locatie</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-purple-900 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-purple-900 uppercase tracking-wider">Eerstvolgende levering</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-purple-900 uppercase tracking-wider">Acties</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($leveranciers as $leverancier)
                                @php
                                    $levering = $leverancier->eerstvolgende_levering;
                                    $isBezig = $levering && $levering->isAfter(now());
                                    $isVoltooid = $levering && !$isBezig;
                                @endphp
                                <tr class="hover:bg-purple-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">{{ $leverancier->bedrijfsnaam }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $leverancier->contact_naam }}</div>
                                        <div class="text-xs text-gray-500">{{ $leverancier->contact_email }}</div>
                                        @if($leverancier->telefoon)
                                            <div class="text-xs text-gray-500">{{ $leverancier->telefoon }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $leverancier->adres }}</td>
                                    <td class="px-6 py-4">
                                        @if ($isBezig)
                                            <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-bold">Bezig</span>
                                        @elseif ($isVoltooid)
                                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-bold">Voltooid</span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold">Inactief</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        @if ($levering)
                                            {{ $levering->format('d-m-Y H:i') }}
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('leveranciers.edit', $leverancier) }}" class="inline-flex items-center px-3 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-lg transition shadow">
                                                Bewerken
                                            </a>
                                            @if(Auth::user()->Rol === 'admin')
                                                <form method="POST" action="{{ route('leveranciers.destroy', $leverancier) }}" class="inline" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-lg transition shadow-lg">
                                                        Verwijderen
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="text-gray-500">
                                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <p class="text-lg font-semibold">Nog geen leveranciers gevonden</p>
                                            <p class="text-sm mt-1">Voeg je eerste leverancier toe om te beginnen</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
