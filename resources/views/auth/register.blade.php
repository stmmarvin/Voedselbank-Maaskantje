<x-guest-layout>
    <div class="mb-6 animate-fade-in">
        <h2 class="text-xl font-bold text-orange-700">Account aanmaken</h2>
        <p class="text-sm text-gray-500 mt-1">Registreer u als klant bij Voedselbank Maaskantje.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4 animate-slide-up">
        @csrf

        <div>
            <label for="GezinsNaam" class="label">Gezinsnaam</label>
            <input id="GezinsNaam" type="text" name="GezinsNaam"
                value="{{ old('GezinsNaam') }}" required
                class="input-field @error('GezinsNaam') border-red-400 @enderror"
                placeholder="Familie De Vries" />
            @error('GezinsNaam')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="Email" class="label">E-mailadres</label>
            <input id="Email" type="email" name="Email"
                value="{{ old('Email') }}" required
                class="input-field @error('Email') border-red-400 @enderror"
                placeholder="uw@email.nl" />
            @error('Email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="Adres" class="label">Adres</label>
            <input id="Adres" type="text" name="Adres"
                value="{{ old('Adres') }}" required
                class="input-field @error('Adres') border-red-400 @enderror"
                placeholder="Straatnaam 1, 5388 AB Maaskantje" />
            @error('Adres')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="Telefoon" class="label">Telefoon <span class="text-gray-400 text-xs">(optioneel)</span></label>
            <input id="Telefoon" type="text" name="Telefoon"
                value="{{ old('Telefoon') }}"
                class="input-field @error('Telefoon') border-red-400 @enderror"
                placeholder="06-12345678" />
            @error('Telefoon')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="Wachtwoord" class="label">Wachtwoord</label>
            <input id="Wachtwoord" type="password" name="Wachtwoord"
                required autocomplete="new-password"
                class="input-field @error('Wachtwoord') border-red-400 @enderror"
                placeholder="••••••••" />
            @error('Wachtwoord')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="Wachtwoord_confirmation" class="label">Bevestig wachtwoord</label>
            <input id="Wachtwoord_confirmation" type="password" name="Wachtwoord_confirmation"
                required autocomplete="new-password"
                class="input-field"
                placeholder="••••••••" />
        </div>

        <button type="submit" class="btn-primary w-full text-center hover:scale-105 hover:shadow-lg transition-all duration-300">
            Account aanmaken
        </button>

        <p class="text-center text-sm text-gray-500">
            Al een account?
            <a href="{{ route('login') }}" class="text-orange-600 font-semibold hover:underline">Inloggen</a>
        </p>
    </form>
</x-guest-layout>
