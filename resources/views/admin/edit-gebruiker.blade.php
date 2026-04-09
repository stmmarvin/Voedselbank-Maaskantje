<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.gebruikers') }}" class="text-orange-600 hover:text-orange-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full uppercase">Admin</span>
                <h2 class="text-xl font-bold text-orange-700">Gebruiker Bewerken</h2>
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

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="card animate-fade-in">
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Gebruiker #{{ $gebruiker->Id }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Bewerk de gegevens van deze gebruiker</p>
                </div>

                <form action="{{ route('admin.gebruikers.update', $gebruiker->Id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Email -->
                    <div>
                        <label for="Email" class="label">E-mailadres</label>
                        <input id="Email" type="email" name="Email"
                            value="{{ old('Email', $gebruiker->Email) }}"
                            required
                            class="input-field @error('Email') border-red-400 @enderror"
                            placeholder="gebruiker@email.nl" />
                        @error('Email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rol -->
                    <div>
                        <label for="Rol" class="label">Rol</label>
                        <select id="Rol" name="Rol" required
                                class="input-field @error('Rol') border-red-400 @enderror">
                            <option value="klant" {{ old('Rol', $gebruiker->Rol) === 'klant' ? 'selected' : '' }}>Klant</option>
                            <option value="admin" {{ old('Rol', $gebruiker->Rol) === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('Rol')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    @if($gebruiker->klant)
                        <div class="pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-4">Klant Gegevens</h4>

                            <!-- Gezinsnaam -->
                            <div class="mb-4">
                                <label for="GezinsNaam" class="label">Gezinsnaam</label>
                                <input id="GezinsNaam" type="text" name="GezinsNaam"
                                    value="{{ old('GezinsNaam', $gebruiker->klant->GezinsNaam) }}"
                                    class="input-field @error('GezinsNaam') border-red-400 @enderror"
                                    placeholder="Familie Jansen" />
                                @error('GezinsNaam')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Adres -->
                            <div class="mb-4">
                                <label for="Adres" class="label">Adres</label>
                                <input id="Adres" type="text" name="Adres"
                                    value="{{ old('Adres', $gebruiker->klant->Adres) }}"
                                    class="input-field @error('Adres') border-red-400 @enderror"
                                    placeholder="Straatnaam 1, 5388 AB Maaskantje" />
                                @error('Adres')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Telefoon -->
                            <div>
                                <label for="Telefoon" class="label">Telefoon <span class="text-gray-400 text-xs">(optioneel)</span></label>
                                <input id="Telefoon" type="text" name="Telefoon"
                                    value="{{ old('Telefoon', $gebruiker->klant->Telefoon) }}"
                                    class="input-field @error('Telefoon') border-red-400 @enderror"
                                    placeholder="06-12345678" />
                                @error('Telefoon')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <!-- Wachtwoord -->
                    <div class="pt-4 border-t border-gray-200">
                        <h4 class="font-semibold text-gray-700 mb-4">Wachtwoord Wijzigen <span class="text-gray-400 text-xs font-normal">(optioneel)</span></h4>
                        
                        <div>
                            <label for="Wachtwoord" class="label">Nieuw Wachtwoord</label>
                            <input id="Wachtwoord" type="password" name="Wachtwoord"
                                class="input-field @error('Wachtwoord') border-red-400 @enderror"
                                placeholder="Laat leeg om niet te wijzigen" />
                            <p class="mt-1 text-xs text-gray-500">Laat dit veld leeg als je het wachtwoord niet wilt wijzigen</p>
                            @error('Wachtwoord')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-3 pt-6">
                        <button type="submit" 
                                class="btn-primary hover:scale-105 transition-all duration-300">
                            💾 Opslaan
                        </button>
                        <a href="{{ route('admin.gebruikers') }}" 
                           class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
