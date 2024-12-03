<section x-data="{ showAll: @entangle('showAll') }" class="py-6">
    <h2>Categorías</h2>
    <hr class="border-1 border-gray-300">
    <ul class="hoverlist">
        @foreach ($categories as $index => $category)
            <li x-show="showAll || {{ $index }} < 3" x-transition>
                <a wire:navigate href="{{ $category->route }}"> <!-- ruta definida mediante un accessor en cada modelo que lo requiere -->
                    <img class="w-8 h-8 object-cover mr-2" src="{{ $category->icon ?? asset('images/default-icon.png') }}" alt="{{ $category->name }}">
                    <span class="font-bold text-sm">{{ $category->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="justify-center">
        <button wire:click="toggleShowAll"
                class="text-sm text-indigo-700 font5 flex items-center cursor-pointer select-none hover:bg-indigo-100 rounded-lg p-3"
                :aria-expanded="showAll.toString()">
            <span x-show="!showAll">Más categorías</span>
            <span x-show="showAll">Mostrar menos</span>
            <svg x-bind:class="showAll && 'rotate-180 duration-300'" xmlns="http://www.w3.org/2000/svg"
                 class="w-4 ml-1.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </button>
    </div>
</section>
