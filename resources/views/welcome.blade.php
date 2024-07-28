<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Qi Tasks</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    @livewireScripts
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
        <!-- Logo Section -->
        <div class="mb-8">
            <img src="https://qi.iq/images/logo.svg?1=1" alt="Qi Logo" class="w-32 h-auto">
        </div>

        <!-- Navigation Section -->
        <div>
            @if (Route::has('login'))
                <div class="mb-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
