<div>
    <!-- Ícono de like -->

    <button wire:click="toggleFavorite"
        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        :class="{ 'text-red-500': {{ auth()->user() && auth()->user()->favoriteProducts->contains($product) ? 'true' : 'false' }} } ">
        <span class="sr-only">Agregar a favoritos</span>
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
        </svg>
    </button>

    <!-- Fin del ícono de like -->

    <!-- Modal que informa que debes loguearte para darle like a un post -->

    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-96 p-6">
                <img src="{{ asset('storage/images/tienda/login.png') }}" alt="">
                <h2 class="text-xl font-semibold text-gray-800">Inicia sesión</h2>
                <p class="mt-2 text-gray-600">Debes iniciar sesión para agregar productos a tus favoritos.</p>

                <div class="mt-4 flex justify-center space-x-4">
                    <!-- Botón Cancelar -->
                    <button wire:click="cerrarModal"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                        Cancelar
                    </button>

                    <!-- Botón para ir a login -->
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Fin del modal -->

</div>
