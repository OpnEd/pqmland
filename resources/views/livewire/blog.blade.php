<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Blog')
    <section class="bg-gray-700 dark:bg-gray-900 text-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            {{-- <a href="{{ route('post.show', ['post' => $featuredPost[0]]) }}" --}}
            <button wire:click="readMore"
                class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                role="alert">
                <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">Nuevo</span> <span
                    class="text-sm font-medium">PQM al día! Dale un vistazo a lo último</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <p class="mb-4 text-lg font-normal text-gray-200 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                ¿Quieres saber <strong>cómo pasar fácilmente</strong> la...</p>
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-100 md:text-5xl lg:text-6xl dark:text-white">
                ... visita de la Secretaría de Salud?</h1>
            <p class="mb-8 text-lg font-normal text-gray-200 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                No te pierdas ninguna de las sesiones de este curso!</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ route('blog') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-500 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Learn more
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-500 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                        </path>
                    </svg>
                    Watch video
                </a>
            </div>
        </div>
    </section>
    <content x-data="{ mobileSidebarOpen: false }" class="grid grid-cols-3 max-w-7xl mx-auto mt-6">
        <movileSidebarNav class="md:hidden col-span-full mx-auto mb-6 z-10 relative">
            <a @click="mobileSidebarOpen = !mobileSidebarOpen"
                class="flex items-center cursor-pointer select-none font-bold hover:bg-indigo-100 rounded-lg p-3">
                <span>Categorías</span>
                <img x-bind:class="mobileSidebarOpen && 'rotate-180 duration-300'" class="w-4 ml-1.5"
                    src="https://img.icons8.com/small/32/777777/expand-arrow.png" />
            </a>
        </movileSidebarNav>
        <main class="col-span-full md:col-span-2 mx-[5%] md:mx-[10%] order-2 md:order-1 rounded-md">

            <div class="flex justify-center bg-gray-200 hover:bg-gray-300 p-2 rounded-lg">
                <h5 class="text-sm text-gray-700 font-semibold font5">Publicación descatacada</h5>
            </div>
            <hr>
            <x-posts.featured-posts-card :featuredPost="$featuredPost[0]" />
            <div class="flex justify-center bg-gray-200 mt-4 hover:bg-gray-300 p-2 rounded-lg">
                <h5 class="text-sm text-gray-700 font-semibold font5">Últimas publicaciones</h5>
            </div>
            <hr class="mb-5">

            @foreach ($latestPosts as $post)
                <div
                    class="flex w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
                    <x-posts.post-card :post="$post" />
                </div>
            @endforeach
            <div class="flex justify-center">
                <a wire:navigate href="{{ route('posts') }}"
                    class="inline-flex items-center px-2 py-1 text-sm text-center text-white bg-green-500 rounded-lg hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-300 dark:hover:bg-gray-700 dark:focus:ring-gray-800 font5">
                    Leer más publicaciones
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            {{-- Modal --}}
            @if ($modalLogueoLectura)
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
                    <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-96 p-6">
                        <img src="{{ asset('storage/images/tienda/login.png') }}" alt="">
                        <h2 class="text-xl font-semibold text-gray-800">Inicia sesión</h2>
                        <p class="mt-2 text-gray-600">Debes iniciar sesión para acceder al contenido!</p>

                        <div class="mt-4 flex justify-center space-x-4">
                            <!-- Botón Cancelar -->
                            <button wire:click="cerrarModal"
                                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                                Cancelar
                            </button>

                            <!-- Botón para ir a login -->
                            <a href="{{ route('post.show', $lastPost) }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Iniciar sesión
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            {{-- <livewire:modal-logueo-lectura /> --}}
        </main>

        <aside x-show="mobileSidebarOpen" x-cloak
            class="md:!block col-span-full md:col-span-1 mx-[5%] md:mr-[20%] order-1 md:order-2"
            x-transition:enter="duration-300 esae-out" x-transition:enter-start="opacity-0 -mt-96"
            x-transition:enter-end="opacity-100 -mt-0">
            <livewire:category-section model-class="\App\Models\BlogCategory" scope-method="published" />
        </aside>
    </content>
</div>
