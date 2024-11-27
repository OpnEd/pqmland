<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PQM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- @component('components.breadcrumbs') @endcomponent --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

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
