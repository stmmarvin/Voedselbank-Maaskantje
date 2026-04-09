<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-3">
                    <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full uppercase">Admin</span>
                    <h2 class="text-xl font-bold text-orange-700">Gebruikers Overzicht</h2>
                </div>
                
                <!-- Tabjes -->
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
                    <a href="#" class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-50 text-red-700 text-sm font-medium hover:bg-red-100 transition">
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

            <!-- Admin Paneel knop -->
            <a href="{{ route('admin.gebruikers') }}" class="flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Admin Paneel
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="card border-l-4 border-blue-500">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-xl">👥</div>
                        <div>
                            <p class="text-sm text-gray-500">Totaal Gebruikers</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $gebruikers->total() }}</p>
                        </div>
                    </div>
                </div>
                <div class="card border-l-4 border-green-500">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-xl">✅</div>
                        <div>
                            <p class="text-sm text-gray-500">Klanten</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $gebruikers->where('Rol', 'klant')->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="card border-l-4 border-orange-500">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-xl">⚙️</div>
                        <div>
                            <p class="text-sm text-gray-500">Admins</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $gebruikers->where('Rol', 'admin')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gebruikers tabel -->
            <div class="card p-0 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Alle Gebruikers</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-orange-50 text-orange-800">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">ID</th>
                                <th class="px-6 py-3 text-left font-semibold">Email</th>
                                <th class="px-6 py-3 text-left font-semibold">Rol</th>
                                <th class="px-6 py-3 text-left font-semibold">Gezinsnaam</th>
                                <th class="px-6 py-3 text-left font-semibold">Laatste Login</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($gebruikers as $gebruiker)
                                <tr class="hover:bg-amber-50 transition-colors">
                                    <td class="px-6 py-4 font-mono text-gray-500">#{{ $gebruiker->Id }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-800">{{ $gebruiker->Email }}</td>
                                    <td class="px-6 py-4">
                                        @if($gebruiker->Rol === 'admin')
                                            <span class="bg-orange-100 text-orange-700 text-xs px-2 py-1 rounded-full font-semibold">Admin</span>
                                        @else
                                            <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full font-semibold">Klant</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $gebruiker->klant?->GezinsNaam ?? '—' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-xs">
                                        {{ $gebruiker->LaatsteLogin ? $gebruiker->LaatsteLogin->format('d-m-Y H:i') : 'Nooit' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                        Geen gebruikers gevonden.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($gebruikers->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                        {{ $gebruikers->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
