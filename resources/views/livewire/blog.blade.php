<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Blog')
    <hero
        class="grid bg-gray-500 text-white text-center bg-cover bg-[url('https://live.staticflickr.com/65535/49909538937_3255dcf9e7_b.jpg')]">
        <div class="col-start-1 row-start-1 bg-gray-800 bg-opacity-40 h-full w-full"></div>
        <div class="col-start-1 row-start-1 py-24">
            <p class="text-lg font-bold">Curso para pasar la visita de la secretaría de salud</p>
            <h1 class="font2">Reqerimientos locativos, dotación y recurso humano</h1>
            <p>Fecha de publicación:</p>
        </div>
    </hero>
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

            <h5 class="text-xl font1">Publicación descatacada</h5>
            <hr>
            <x-posts.featured-posts-card :featuredPost="$featuredPost[0]" />

            <h5 class="text-xl font1">Últimas publicaciones</h5>
            <hr class="mb-5">

            @foreach ($latestPosts as $post)
                <div
                    class="flex w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
                    <x-posts.post-card :post="$post" />
                </div>
            @endforeach

        </main>

        <aside x-show="mobileSidebarOpen" x-cloak
            class="md:!block col-span-full md:col-span-1 mx-[5%] md:mr-[20%] order-1 md:order-2"
            x-transition:enter="duration-300 esae-out" x-transition:enter-start="opacity-0 -mt-96"
            x-transition:enter-end="opacity-100 -mt-0">
            <section class="card p-4">
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
