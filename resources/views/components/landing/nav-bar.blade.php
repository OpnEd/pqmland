<nav x-data="{ movilenavOpen: false }" class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="md:flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('inicio') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-application-logo class="w-15 h-15 fill-current text-gray-500" />
                <span class="self-center text-2xl text-indigo-500 font3 whitespace-nowrap dark:text-white">PQM</span>
            </a>
            <mobileicon class="md:hidden">
                <a @click="movilenavOpen = !movilenavOpen"
                    class="h-12 w-12 flex items-center justify-center cursor-pointer hover:bg-indigo-200 rounded-lg">
                    <img x-show="!movilenavOpen" class="w-6 h-6 select-none"
                        src="https://img.icons8.com/small/64/menu.png">
                    <img x-show="movilenavOpen" x-cloak class="w-6 h-6 select-none"
                        src="https://img.icons8.com/small/64/delete-sign.png">
                </a>
            </mobileicon>
        </div>
        {{-- <ul class="flex items-center space-x-6 rtl:space-x-reverse"> --}}
        <nav x-show="movilenavOpen" x-cloak
            class="md:!block bg-gray-100 rounded-lg px-3 h-screen w-screen md:h-auto md:w-auto absolute md:relative -translate-x-7"
            x-transition:enter="duration-300 esae-out" x-transition:enter-start="opacity-0 -translate-y-96"
            x-transition:enter-end="opacity-100 -translate-y-0">
            <ul
                class="flex items-center navitems flex-col md:flex-row gap-8 md:gap-0 justify-center h-full -translate-y-10 md:translate-y-0 font5">
                {{-- <li class="my-3"> --}}
                <li>
                    <p class="text-sm text-gray-500 dark:text-white px-6">(57) 314 309 5251</p>
                </li>
                {{-- <li class="my-3"> --}}
                <li>
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                    {{-- <a href="#" class="text-sm  text-blue-600 dark:text-blue-500">Login</a> --}}
                </li>
                @auth()
                <li x-data="{ dropdownOpen: false }" class="relative">
                    <a @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false"
                        class="flex items-center gap-2 cursor-pointer select-none">
                        <img class="h-8 rounded-full object-cover bg-teal-200"
                            src="https://img.icons8.com/doodle/96/null/bart-simpson.png" />
                        Bart
                        <img x-bind:class="dropdownOpen ? 'rotate-180 duration-300' : ''" class="w-4"
                            src="https://img.icons8.com/small/32/777777/expand-arrow.png" />
                    </a>
                    <div x-show="dropdownOpen" x-cloak
                        class="absolute right-0 bg-white text-black shadow rounded-lg w-40 p-2 z-10"
                        x-transition:enter="duration-300 esae-out"
                        x-transition:enter-start="opacity-0 -translate-y-5 scale-90"
                        x-transition:enter-end="opacity-100 -translate-y-0 scale-100">
                        <ul class="hoverlist [&>li>a]:justify-end">
                            <li><a href="">My profile</a></li>
                            <li><a href="">Log out</a></li>
                        </ul>
                    </div>
                </li>
                @endauth
                @foreach ($links as $link)
                    <div class="md:hidden hoverlist">
                        <li>
                            <x-landing.link :ruta="$link['route']" :texto="$link['name']" :clase="$link['class'] ?? ''" :target="$link['target'] ?? '_self'" />
                        </li>
                    </div>
                @endforeach
            </ul>
        </nav>
    </div>
</nav>
<nav class="hidden md:block bg-gray-100 dark:bg-gray-700 h-12">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm navitems">
                @foreach ($links as $link)
                    <li>
                        <x-landing.link :ruta="$link['route']" :texto="$link['name']" :clase="$link['class'] ?? ''" :target="$link['target'] ?? '_self'" />
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>



{{--     <nav>
            <ul class="flex items-center [&>li>a]:p-4 [&>li>a:hover]:bg-gray-700 [&>li>a]:rounded-lg">
                <li><a href="">Home</a></li>
                <li><a href="">Create</a></li>
                <li><a href="">Richard</a></li>
            </ul>
        </nav> --}}
{{-- El nav de arriba sería de este modo
        <style type="text/tailwindcss">
            .navitems>li>a {
                @apply p-4 hover:bg-gray-700 rounded-lg
            }
        </style>
        <nav>
            <ul class="flex items-center navitems">
                <li><a href="">Home</a></li>
                <li><a href="">Create</a></li>
                <li><a href="">Richard</a></li>
            </ul>
        </nav> --}}
