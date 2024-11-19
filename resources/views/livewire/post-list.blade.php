<div class="max-w-7xl mx-auto mt-6 px-8">
    <content x-data="{ mobileSidebarOpen: false }" class="grid grid-cols-3 max-w-7xl mx-auto mt-6">
        <movileSidebarNav class="md:hidden col-span-full mx-auto mb-6 z-10 relative">
            <a @click="mobileSidebarOpen = !mobileSidebarOpen"
                class="flex items-center cursor-pointer select-none font-bold hover:bg-indigo-100 rounded-lg p-3">
                <span>Categorías</span>
                <img x-bind:class="mobileSidebarOpen && 'rotate-180 duration-300'" class="w-4 ml-1.5"
                    src="https://img.icons8.com/small/32/777777/expand-arrow.png" />
            </a>
        </movileSidebarNav>
        <main class="col-span-full md:col-span-2 mx-[5%] md:mx-[10%] order-2 md:order-1">
            @section('pageDescription', 'Esta es una descripción específica para la página Blog')
            <div class="flex justify-between items-center border-b border-gray-100">
                <div class="flex items-center space-x-4 font-light">
                    <button
                        class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                        wire:click="setSort('desc')">Latest</button>
                    <button
                        class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 "
                        wire:click="setSort('asc')">Oldest</button>
                </div>
            </div>
            <div class="py-4">
                @foreach ($this->posts as $post)
                    <div class="flex w-full mb-5">
                        <x-posts.post-card :post="$post" />
                    </div>
                    <hr class="border-1 border-black">
                @endforeach
            </div>
            <div class="my-3">
                {{ $this->posts->links() }}
            </div>

        </main>

        <aside x-show="mobileSidebarOpen" x-cloak
            class="md:!block col-span-full md:col-span-1 mx-[5%] md:mr-[20%] order-1 md:order-2"
            x-transition:enter="duration-300 esae-out" x-transition:enter-start="opacity-0 -mt-96"
            x-transition:enter-end="opacity-100 -mt-0">
            <section class="">
                <h2>Categorías</h2>
                <ul class="hoverlist">
                    <li class="highlight"><a href="">
                            <img class="w-8 h-8 object-cover mr-2"
                                src="https://img.icons8.com/?size=100&id=22136&format=png&color=000000">
                            <span class="font-bold text-sm">Gesión Calidad</span>
                        </a></li>
                    <li><a href=""></a>URM</li>
                    <li><a href=""></a>EVS</li>
                    <li><a href=""></a>Salud</li>
                    <li><a href=""></a>Legislación</li>
                </ul>
            </section>
        </aside>
    </content>
</div>
