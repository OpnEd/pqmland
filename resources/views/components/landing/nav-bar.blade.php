<nav class="bg-white dark:bg-gray-800 antialiased sticky top-0 z-50">
    @php
        $categories = config('categories');
    @endphp
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
        <div class="flex items-center justify-between">

            <div class="flex items-center space-x-8">
                <div class="shrink-0">
                    <a href="{{ route('inicio') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <x-application-logo class="w-15 h-15 fill-current text-gray-500" />
                        <span
                            class="hidden self-center text-4xl text-indigo-500 font3 whitespace-nowrap dark:text-white">PQM</span>
                    </a>
                </div>

                <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center navitems">

                    @foreach ($links as $link)
                        <li>
                            <x-landing.link :ruta="$link['route']" :texto="$link['name']" :clase="$link['class'] ?? ''" :target="$link['target'] ?? '_self'" />
                        </li>
                    @endforeach
                    <li class="relative flex items-center">
                        <div class="hoverlist">
                            <div x-data="{ open: false }" class="inline-flex rounded-md shadow-sm">
                                <a href="{{ route('tienda') }}"
                                    class="px-4 py-2 rounded-l-md {{ request()->routeIs('tienda') ? 'bg-indigo-700 text-white border-indigo-800' : 'bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2' }}">
                                    {{ __('messages.nav.store') }}
                                </a>
                                <button @click="open = !open"
                                    class="px-4 py-2 bg-indigo-500 text-white rounded-r-md border-l border-indigo-600 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <img x-bind:class="open ? 'rotate-180 duration-300' : ''" class="w-4"
                                        src="https://img.icons8.com/small/32/FFFFFF/expand-arrow.png" />
                                </button>
                                <div x-show="open" @click.away="open = false" x-cloak
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                    <div class="py-1" role="menu" aria-orientation="vertical"
                                        aria-labelledby="options-menu">
                                        @foreach ($categories as $category)
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                                                role="menuitem">{{ $category['name'] }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="flex items-center lg:space-x-2 font5">

                <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                    class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Cart
                    </span>
                    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <span class="hidden sm:flex">{{ __('messages.nav.cart') }}</span>
                    <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <div id="myCartDropdown1"
                    class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                    @if (empty($carrito))
                        <p>No tienes productos en el carrito.</p>
                    @else
                        @foreach ($carrito as $id => $item)
                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#" class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">
                                        {{ $item['nombre'] }}
                                    </a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">${{ number_format($item['precio'], 2) }}</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Cant: {{ $item['cantidad'] }}</p>

                                    <button data-tooltip-target="tooltipRemoveItem1a" type="button" wire:click="eliminarProducto({{ $id }})"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Eliminar </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem1a" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Eliminar producto
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <a href="#" title=""
                        class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        role="button"> Proceed to Checkout </a>
                </div>

                @if (Route::has('login'))
                    <div class="hidden sm:flex hover:bg-gray-100 dark:hover:bg-gray-700 px-3 rounded-lg">
                        <livewire:welcome.navigation />
                    </div>
                @endif

                <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                    aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                    class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Open Menu
                    </span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="ecommerce-navbar-menu-1"
            class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
            <ul class="text-gray-900 text-sm font-medium dark:text-white space-y-3">
                <x-responsive-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')" wire:navigate>
                    {{ __('messages.nav.home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('nosotros')" :active="request()->routeIs('nosotros')" wire:navigate>
                    {{ __('messages.nav.about') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')" wire:navigate>
                    {{ __('Blog') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tienda')" :active="request()->routeIs('tienda')" wire:navigate>
                    {{ __('messages.nav.store') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contacto')" :active="request()->routeIs('contacto')" wire:navigate>
                    {{ __('messages.nav.contact') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('messages.nav.dashboard') }}
                </x-responsive-nav-link>
            </ul>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <livewire:welcome.navigation />
            </div>
        </div>
    </div>
</nav>
