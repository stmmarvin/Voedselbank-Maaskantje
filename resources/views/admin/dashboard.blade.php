<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full uppercase">Admin</span>
            <h2 class="text-xl font-bold text-orange-700">Beheerpaneel</h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Welkom bericht -->
            <div class="card border-l-4 border-orange-500">
                <h3 class="font-semibold text-orange-700 text-lg">Welkom, beheerder</h3>
                <p class="text-gray-600 text-sm mt-1">
                    U bent ingelogd als <strong>administrator</strong> van Voedselbank Maaskantje.
                </p>
                <p class="text-xs text-gray-400 mt-2">Ingelogd als: {{ Auth::user()->Email }}</p>
            </div>

            <!-- Tabjes grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Informatie -->
                <div class="card hover:shadow-lg transition-shadow cursor-pointer border-t-4 border-blue-500">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Informatie</h3>
                        <p class="text-xs text-gray-500 mt-1">Algemene info</p>
                    </div>
                </div>

                <!-- Voorraad -->
                <div class="card hover:shadow-lg transition-shadow cursor-pointer border-t-4 border-green-500">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Voorraad</h3>
                        <p class="text-xs text-gray-500 mt-1">Beschikbare producten</p>
                    </div>
                </div>

                <!-- Allergieën -->
                <div class="card hover:shadow-lg transition-shadow cursor-pointer border-t-4 border-red-500">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Allergieën</h3>
                        <p class="text-xs text-gray-500 mt-1">Allergie informatie</p>
                    </div>
                </div>

                <!-- Leveranciers -->
                <div class="card hover:shadow-lg transition-shadow cursor-pointer border-t-4 border-purple-500">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Leveranciers</h3>
                        <p class="text-xs text-gray-500 mt-1">Onze partners</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
