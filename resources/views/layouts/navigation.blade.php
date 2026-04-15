<nav x-data="{ open: false }" class="bg-orange-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo + Nav Links -->
            <div class="flex items-center gap-6">
                <a href="{{ Auth::user()->isAdmin() ? route('admin.dashboard') : route('dashboard') }}"
                   class="flex items-center gap-2">
                    <div class="w-9 h-9 bg-white rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 2v7c0 1.1.9 2 2 2h2v11h2V11h2c1.1 0 2-.9 2-2V2H3zm16 0v6h-1V2h-2v6h-1V2h-2v6c0 1.66 1.34 3 3 3v11h2V11c1.66 0 3-1.34 3-3V2h-2z"/>
                        </svg>
                    </div>
                    <span class="text-white font-bold text-lg hidden lg:block">
                        Voedselbank <span class="text-orange-300">Maaskantje</span>
                    </span>
                </a>
                <a href="{{ route('voorraad.index') }}" class="text-white hover:text-orange-300 font-semibold">Voorraad</a>
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex sm:items-center gap-4">
                @if(Auth::user()->isAdmin())
                    <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full uppercase tracking-wide">
                        Admin
                    </span>
                @endif
                <span class="text-orange-100 text-sm">{{ Auth::user()->Email }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-orange-200 hover:text-white text-sm underline transition-colors">
                        Uitloggen
                    </button>
                </form>
            </div>

            <!-- Mobile hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="text-orange-200 hover:text-white p-2 rounded-md">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-orange-700 px-4 pb-4">
        <div class="pt-2 space-y-1">
            <a href="{{ route('dashboard') }}" class="block nav-link">Overzicht</a>
            <a href="#" class="block nav-link">📋 Informatie</a>
            <a href="{{ route('voorraad.index') }}" class="block nav-link">📦 Voorraad</a>
            <a href="#" class="block nav-link">⚠️ Allergieën</a>
            <a href="#" class="block nav-link">🏢 Leveranciers</a>
        </div>
        <div class="border-t border-orange-600 mt-3 pt-3 space-y-2">
            <p class="text-orange-200 text-sm px-3">{{ Auth::user()->Email }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left text-orange-200 hover:text-white px-3 py-2 text-sm">
                    Uitloggen
                </button>
            </form>
        </div>
    </div>
</nav>
