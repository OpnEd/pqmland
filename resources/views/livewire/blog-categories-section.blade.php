<section x-data="{ showAll: false }" class="py-6">
    <h2>Categorías</h2>
    <hr class="border-1 border-gray-300">
    <ul class="hoverlist">
        @foreach ($blogCategories as $index => $category)
            <li x-show="showAll || {{ $index }} < 3">
                <a wire:navigate href="{{ route('posts', ['category' => $category->slug]) }}">
                    <img class="w-8 h-8 object-cover mr-2" src="{{ $category->icon }}">
                    <span class="font-bold text-sm">{{ $category->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="justify-center">
        <button @click="showAll = !showAll"
            class="text-sm text-indigo-700 font5 flex items-center cursor-pointer select-none hover:bg-indigo-100 rounded-lg p-3">
            <span x-show="!showAll">Más categorías</span>
            <span x-show="showAll">Mostrar menos</span>
            <img x-bind:class="showAll && 'rotate-180 duration-300'" class="w-4 ml-1.5"
                src="https://img.icons8.com/small/32/777777/expand-arrow.png" />
        </button>
    </div>
</section>
