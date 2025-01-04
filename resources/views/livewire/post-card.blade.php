<div class="flex flex-col md:flex-row p-5">
    <div class="md:pr-4 items-center max-w-full md:max-w-40 mb-4 md:mb-0">
        <img class="rounded-lg" src="{{ Storage::url('images/' . $post->cover) }}" alt="">
    </div>
    <div class="">
        <a href="#">
            <h5 class="mb-2 text-xl font-bold tracking-wider text-gray-900 dark:text-white">
                {{ $post->title }}</h5>
        </a>
        <div class="flex justify-between items-center py-3">
            <span class="flex flex-wrap items-center text-gray-600">
                <span>
                    <span class="text-gray-500">Por</span>
                    <strong>{{ $post->author->name . ' ' . $post->author->last_name }}</strong>
                    <span class="mx-2 text-gray-300">|</span>
                </span>
                <span>
                    <span class="text-xs">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('M Y') }}</span>
                    <span class="mx-2 text-gray-300">|</span>
                </span>
                <span>
                    @foreach ($post->tags as $tag)
                        <span class="bg-indigo-100 text-indigo-800 rounded-lg px-2 py-1 mr-2">{{ $tag }}</span>
                    @endforeach

                    <span class="mx-2 text-gray-300">|</span>
                </span>
                <div class="flex flex-row items-center justify-center gap-3">
                    <span>
                        <livewire:favorite-posts :post="$post" />
                    </span>

                    <button
                        class="relative inline-flex items-center justify-center p-2 text-sm font-medium leading-none dark:text-white text-center text-white bg-indigo-400 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-600 dark:bg-indigo-100 dark:hover:bg-indigo-200 dark:focus:ring-indigo-100">
                        <span class="sr-only">
                            Comments
                        </span>
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                        </svg>
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-gray-100 bg-gray-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-300">
                            {{ $post->comments->count() }}</div>
                    </button>
                </div>

                <span>
                    {{ $post->getReadingTime() }} Mins. de lectura
                </span>
            </span>
        </div>
        <hr class="py-1">
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->abstract }}</p>
        <a wire:click="readMore"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 cursor-pointer rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Leer más
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>

    <!-- Fin de -->

    <!-- Modal que informa que debes loguearte para darle like a un post -->

    @if ($modalLogReadMore)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-96 p-6">
                <img src="https://www.pqm-pharmaquality.com.co/storage/app/public/login.png" alt="">
                <h2 class="text-xl font-semibold text-gray-800">Inicia sesión</h2>
                <p class="mt-2 text-gray-600">Debes iniciar sesión para leer el resto del contenido!</p>

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
