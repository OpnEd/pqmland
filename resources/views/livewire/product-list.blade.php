<div class="max-w-7xl mx-auto mt-6 px-8">
    <content x-data="{ mobileSidebarOpen: false }" class="grid grid-cols-5 max-w-7xl mx-auto mt-6">
        <movileSidebarNav class="md:hidden col-span-full mx-auto mb-6 z-10 relative">
            <a @click="mobileSidebarOpen = !mobileSidebarOpen"
                class="flex items-center cursor-pointer select-none font-bold hover:bg-indigo-100 rounded-lg p-3">
                <span>Categorías</span>
                <img x-bind:class="mobileSidebarOpen && 'rotate-180 duration-300'" class="w-4 ml-1.5"
                    src="https://img.icons8.com/small/32/777777/expand-arrow.png" />
            </a>
        </movileSidebarNav>
        <main class="col-span-full md:col-span-4 mx-[5%] md:mx-[5%] order-1 md:order-2">
            <div class="flex justify-between items-center border-b border-gray-100">
                @if ($search)
                    <div class="p-2 bg-green-200 text-sm rounded-lg">
                        <p>Estás buscando: <strong>{{ $search }}</strong></p>
                    </div>
                @endif
                <div class="flex items-center space-x-4 font-light">
                    <button
                        class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 px-2 ml-2 order-1 md:order-1"
                        wire:click="setSort('desc')">Recientes</button>
                    <button
                        class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 px-2 order-2 md:order-2"
                        wire:click="setSort('asc')">Antiguos</button>
                </div>
            </div>
            <div class="py-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($this->products as $product)
                    <div class="flex w-full">
                        <x-products.product-card :product="$product" />
                    </div>
                @endforeach
            </div>
            <livewire:modal-confirm-product />
            <div class="my-3">
                {{ $this->products->links() }}
            </div>
        </main>
        <aside x-show="mobileSidebarOpen" x-cloak
                class="md:!block col-span-full md:col-span-1 mx-[5%] md:mr-[5%] order-2 md:order-1 sticky"
                x-transition:enter="duration-300 esae-out" x-transition:enter-start="opacity-0 -mt-96"
                x-transition:enter-end="opacity-100 -mt-0">
                <livewire:search-box />
                <livewire:category-section model-class="\App\Models\ProductCategory" />
        </aside>
    </content>
</div>
