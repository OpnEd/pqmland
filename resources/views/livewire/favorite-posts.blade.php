<div>
    <!-- Ícono de like -->

    <div class="flex items-center gap-4 [&>a:hover]:underline">
        <button
            wire:click="togglePFavorite"
            class="relative inline-flex items-center justify-center text-sm font-medium leading-none rounded-lg p-2 bg-gray-200 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            :class="{ 'text-green-500': {{ auth()->user() && auth()->user()->favoritePosts->contains($post->id) ? 'true' : 'false' }} }">
            <span class="sr-only">Agregar a favoritos</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475" />
            </svg>
            <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-gray-100 bg-gray-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-300">{{ $post->favoritedByUsers()->count() }}</div>
        </button>
    </div>

    <!-- Fin del ícono de like -->

    <!-- Modal que informa que debes loguearte para darle like a un post -->

    @if ($modalLogLikePost)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-96 p-6">
                <img src="{{ asset('storage/images/tienda/login.png') }}" alt="">
                <h2 class="text-xl font-semibold text-gray-800">Inicia sesión</h2>
                <p class="mt-2 text-gray-600">Debes iniciar sesión para darle like a esta publicación!</p>

                <div class="mt-4 flex justify-center space-x-4">
                    <!-- Botón Cancelar -->
                    <button wire:click="cerrarModal"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                        Cancelar
                    </button>

                    <!-- Botón para ir a login -->
                    <a href="{{ route('post.show', $post) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Fin del modal -->

</div>
