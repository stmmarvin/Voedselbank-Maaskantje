<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-3">
                    <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full uppercase">Admin</span>
                    <h2 class="text-xl font-bold text-orange-700">Beheerpaneel</h2>
                </div>
                
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

            <!-- Admin Paneel knop rechts -->
            <a href="{{ route('admin.gebruikers') }}" class="flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Admin Paneel
            </a>
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
            <div class="card border-l-4 border-orange-500 hover:shadow-xl hover:scale-[1.02] transition-all duration-300 animate-fade-in">
                <h3 class="font-semibold text-orange-700 text-lg">Welkom, beheerder</h3>
                <p class="text-gray-600 text-sm mt-1">
                    U bent ingelogd als <strong>administrator</strong> van Voedselbank Maaskantje.
                </p>
                <p class="text-xs text-gray-400 mt-2">Ingelogd als: {{ Auth::user()->Email }}</p>
            </div>

            <!-- Admin Snelkoppelingen -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-slide-up">
                <!-- Gebruikers beheren -->
                <a href="{{ route('admin.gebruikers') }}" class="card border-l-4 border-blue-500 hover:shadow-xl hover:scale-105 transition-all duration-300 group">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg group-hover:bg-blue-200 transition">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Gebruikers</h4>
                            <p class="text-sm text-gray-500">Beheer klanten</p>
                        </div>
                    </div>
                </a>

                <!-- Voorraad beheren -->
                <div class="card border-l-4 border-green-500 hover:shadow-xl hover:scale-105 transition-all duration-300 group cursor-pointer opacity-60">
                    <div class="flex items-center gap-4">
                        <div class="bg-green-100 p-3 rounded-lg group-hover:bg-green-200 transition">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Voorraad</h4>
                            <p class="text-sm text-gray-500">Binnenkort beschikbaar</p>
                        </div>
                    </div>
                </div>

                <!-- Pakketten beheren -->
                <div class="card border-l-4 border-purple-500 hover:shadow-xl hover:scale-105 transition-all duration-300 group cursor-pointer opacity-60">
                    <div class="flex items-center gap-4">
                        <div class="bg-purple-100 p-3 rounded-lg group-hover:bg-purple-200 transition">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Pakketten</h4>
                            <p class="text-sm text-gray-500">Binnenkort beschikbaar</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
