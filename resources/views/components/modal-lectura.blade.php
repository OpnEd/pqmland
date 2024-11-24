@props(['post'])

<div class="flex flex-col md:flex-row p-5">

    <div class="md:pr-4 items-center max-w-full md:max-w-40 mb-4 md:mb-0">
        <img class="rounded-lg" src="{{ Storage::url('images/' . $post->cover) }}" alt="">
    </div>

    <div x-data="{ showModal: false }" class="">

        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $post->title }}</h5>
        </a>

        <div class="flex justify-between items-center py-3">
            <span class="flex flex-wrap items-center text-gray-600">
                <span>
                    <span class="text-gray-500">Por</span> <strong>{{ $post->author->name }}</strong>
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

                <span>
                    {{ $post->comments->count() }} Comentarios

                    <span class="mx-2 text-gray-300">|</span>
                </span>

                <span>
                    {{ $post->getReadingTime() }} Mins. de lectura
                </span>
            </span>
        </div>

        <hr class="py-1">

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->abstract }}</p>

        <a
            @click.prevent="
                @guest
                    showModal = true;
                @else
                    window.location.href='{{ route('post.show', $post) }}';
                @endguest"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            Leer más
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>

        <!-- Modal -->
        <div
            x-show="showModal"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50"
            x-transition
        >
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full relative">
                <button
                    @click="showModal = false"
                    class="absolute top-2 right-2 text-gray-400 hover:text-gray-600"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <h2 class="text-lg font-bold text-gray-800 mb-4">¡Debes estar autenticado!</h2>
                <p class="text-gray-600 mb-6">Por favor, inicia sesión o regístrate para continuar leyendo este contenido.</p>

                <div class="flex justify-between space-x-4">
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 transition"
                    >
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 text-sm font-medium text-center text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 transition"
                    >
                        Registrarse
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
