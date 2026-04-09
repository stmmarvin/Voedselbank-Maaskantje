<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-8">
                <h2 class="text-xl font-bold text-orange-700">Mijn Overzicht</h2>
                
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
        </div>
    </x-slot>

    <div class="py-10 relative overflow-hidden">
        <!-- Watermark logo rechts onderin -->
        <div class="fixed bottom-0 right-0 opacity-5 pointer-events-none z-0" style="transform: rotate(-15deg) translate(20%, 20%);">
            <svg class="w-96 h-96 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 2v7c0 1.1.9 2 2 2h2v11h2V11h2c1.1 0 2-.9 2-2V2H3zm16 0v6h-1V2h-2v6h-1V2h-2v6c0 1.66 1.34 3 3 3v11h2V11c1.66 0 3-1.34 3-3V2h-2z"/>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10">

            <!-- Welkom bericht -->
            <div class="card border-l-4 border-orange-600 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 animate-fade-in">
                <h3 class="font-semibold text-orange-700 text-lg">Welkom bij Voedselbank Maaskantje</h3>
                <p class="text-gray-600 text-sm mt-1">
                    U bent ingelogd als <strong>{{ Auth::user()->isAdmin() ? 'administrator' : 'klant' }}</strong>.
                </p>
                <p class="text-xs text-gray-400 mt-2">Ingelogd als: {{ Auth::user()->Email }}</p>
            </div>

            @if(Auth::user()->isAdmin())
                <!-- Admin Paneel knop -->
                <div class="card bg-gradient-to-r from-orange-500 to-orange-600 text-white border-0 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 animate-slide-up">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-bold text-lg">⚙️ Beheerderspaneel</h3>
                            <p class="text-orange-100 text-sm mt-1">Toegang tot het admin paneel</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="bg-white text-orange-600 font-semibold px-6 py-3 rounded-lg hover:bg-orange-50 transition-colors shadow-lg">
                            Open Admin Paneel →
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
