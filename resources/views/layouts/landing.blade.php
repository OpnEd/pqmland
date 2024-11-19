<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <title>{{ $title ?? 'PQM' }}</title>
    <meta name="description" content="@yield('pageDescription', 'Descripción por defecto de la aplicación')">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon.png') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-gray-50">

    <!-- Navbar -->

    <x-landing.nav-bar>
    </x-landing.nav-bar>

    <!-- Main Content -->

    {{ $slot }}

    <!-- Footer -->

    <x-landing.footer>
    </x-landing.footer>

    @livewireScripts
</body>

</html>
