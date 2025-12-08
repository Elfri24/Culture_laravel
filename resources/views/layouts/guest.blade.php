<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative bg-cover bg-center px-4"
        style="
            background-image:
                linear-gradient(rgba(255 255 255 / 0.75), rgba(99 102 241 / 0.6)),
                url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1470&q=80');
        "
    >
        <!-- Overlay dégradé supplémentaire (optionnel) -->
        <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-indigo-600/60"></div>

        <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-8 bg-white/80 backdrop-blur-md shadow-lg rounded-lg overflow-hidden">
            <div class="flex justify-center mb-6">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            {{ $slot }}
        </div>
    </div>

</body>
</html>
