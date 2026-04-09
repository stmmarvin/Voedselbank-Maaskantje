<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Voedselbank Maaskantje') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" style="background-color: #fdf6ec;">

    <!-- Background pattern -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">

        <!-- Decorative top bar -->
        <div class="fixed top-0 left-0 right-0 h-1 bg-gradient-to-r from-orange-600 via-orange-500 to-orange-400"></div>

        <!-- Logo & Title -->
        <div class="mb-6 text-center">
            <div class="flex items-center justify-center gap-3 mb-2">
                <!-- Voedselbank icon -->
                <div class="w-14 h-14 bg-orange-600 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 2v7c0 1.1.9 2 2 2h2v11h2V11h2c1.1 0 2-.9 2-2V2H3zm16 0v6h-1V2h-2v6h-1V2h-2v6c0 1.66 1.34 3 3 3v11h2V11c1.66 0 3-1.34 3-3V2h-2z"/>
                    </svg>
                </div>
                <div class="text-left">
                    <h1 class="text-2xl font-bold text-orange-700">Voedselbank</h1>
                    <p class="text-sm text-orange-500 font-semibold tracking-wide">Maaskantje</p>
                </div>
            </div>
            <p class="text-gray-500 text-sm">Samen zorgen we voor elkaar</p>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-xl rounded-2xl border border-orange-100">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <p class="mt-6 text-xs text-gray-400">© {{ date('Y') }} Voedselbank Maaskantje</p>
    </div>
</body>
</html>
