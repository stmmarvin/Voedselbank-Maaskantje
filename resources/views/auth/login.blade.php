<x-guest-layout>
    <div class="mb-6 animate-fade-in">
        <h2 class="text-xl font-bold text-orange-700">Inloggen</h2>
        <p class="text-sm text-gray-500 mt-1">Welkom terug bij Voedselbank Maaskantje.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5 animate-slide-up">
        @csrf

        <div>
            <label for="Email" class="label">E-mailadres</label>
            <input id="Email" type="email" name="Email"
                value="{{ old('Email') }}"
                required autofocus autocomplete="username"
                class="input-field @error('Email') border-red-400 @enderror"
                placeholder="uw@email.nl" />
            @error('Email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="Wachtwoord" class="label">Wachtwoord</label>
            <input id="Wachtwoord" type="password" name="Wachtwoord"
                required autocomplete="current-password"
                class="input-field @error('Wachtwoord') border-red-400 @enderror"
                placeholder="••••••••" />
            @error('Wachtwoord')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                <input type="checkbox" name="remember"
                    class="rounded border-gray-300 text-orange-600 focus:ring-orange-500">
                Onthoud mij
            </label>
        </div>

        <button type="submit" class="btn-primary w-full text-center hover:scale-105 hover:shadow-lg transition-all duration-300">
            Inloggen
        </button>

        <p class="text-center text-sm text-gray-500">
            Nog geen account?
            <a href="{{ route('register') }}" class="text-orange-600 font-semibold hover:underline">Registreer hier</a>
        </p>
    </form>
</x-guest-layout>
