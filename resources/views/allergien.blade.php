<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Terug knop -->
                <a href="{{ route('dashboard') }}" class="text-orange-600 hover:text-orange-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h2 class="text-xl font-bold text-red-700">⚠️ Allergieën</h2>
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

            <!-- Info Card -->
            <div class="card border-l-4 border-red-500 animate-fade-in">
                <h3 class="font-semibold text-red-700 text-lg">Uw Allergieën</h3>
                <p class="text-gray-600 text-sm mt-1">
                    Hier kunt u uw allergieën en dieetwensen beheren.
                </p>
            </div>

            <!-- Allergieën Lijst -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-slide-up">
                
                <!-- Veelvoorkomende Allergieën -->
                <div class="card hover:shadow-xl transition-all duration-300">
                    <h4 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="text-2xl">🥜</span>
                        Veelvoorkomende Allergieën
                    </h4>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                            <span class="text-gray-700">Pinda's</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                            <span class="text-gray-700">Noten</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                            <span class="text-gray-700">Melk / Lactose</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                            <span class="text-gray-700">Eieren</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                            <span class="text-gray-700">Gluten</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-red-600 rounded focus:ring-red-500">
                            <span class="text-gray-700">Soja</span>
                        </label>
                    </div>
                </div>

                <!-- Dieetwensen -->
                <div class="card hover:shadow-xl transition-all duration-300">
                    <h4 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <span class="text-2xl">🥗</span>
                        Dieetwensen
                    </h4>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="text-gray-700">Vegetarisch</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="text-gray-700">Veganistisch</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="text-gray-700">Halal</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="text-gray-700">Kosher</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="text-gray-700">Suikervrij</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition cursor-pointer">
                            <input type="checkbox" class="w-5 h-5 text-green-600 rounded focus:ring-green-500">
                            <span class="text-gray-700">Zoutarm</span>
                        </label>
                    </div>
                </div>

            </div>

            <!-- Extra opmerkingen -->
            <div class="card animate-slide-up">
                <h4 class="font-semibold text-gray-800 mb-3">Extra Opmerkingen</h4>
                <textarea 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                    rows="4"
                    placeholder="Heeft u nog andere allergieën of dieetwensen? Laat het ons hier weten..."></textarea>
            </div>

            <!-- Opslaan knop -->
            <div class="flex items-center gap-3">
                <button class="btn-primary hover:scale-105 transition-all duration-300">
                    💾 Opslaan
                </button>
                <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition">
                    Terug
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
