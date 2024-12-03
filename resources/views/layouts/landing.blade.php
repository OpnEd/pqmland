<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Special+Elite&family=Audiowide&family=Goldman&family=Michroma&family=Inter&display=swap"
        rel="stylesheet">
    <title>{{ $title ?? 'PQM' }}</title>
    <meta name="description" content="@yield('pageDescription', 'Descripción por defecto de la aplicación')">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon.png') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-gray-50">

    <!-- Navbar -->

    <x-landing.nav-bar>
    </x-landing.nav-bar>

    @component('components.breadcrumbs') @endcomponent

    <!-- Main Content -->
    @if (request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('contacto'))
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    @endif

    {{ $slot }}

    @if (request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('contacto'))
            </div>
        </div>
    @endif

    <!-- Footer -->

    <x-landing.footer>
    </x-landing.footer>

    @livewire('wire-elements-modal')
    @livewireScripts
    {{-- <script>
        function carousel() {
            return {
                current: 0,
                items: [0, 1, 2], // Cambia este arreglo si agregas más imágenes
                next() {
                    this.current = (this.current + 1) % this.items.length;
                },
                prev() {
                    this.current = (this.current - 1 + this.items.length) % this.items.length;
                },
                goTo(index) {
                    this.current = index;
                },
            };
        }
    </script> --}}
</body>

</html>
