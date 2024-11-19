@props(['post'])

<div class="flex flex-col md:flex-row p-5">
    <div class="md:pr-4 items-center max-w-full md:max-w-40 mb-4 md:mb-0">
        <img class="rounded-lg" src="{{ Storage::url('images/' . $post->cover) }}" alt="">
    </div>
    <div class="">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $post->title }}</h5>
        </a>
        <div class="flex justify-between items-center py-3">
            <span class="flex flex-wrap items-center text-gray-600">
                <span>
                    <span class="text-gray-500">Por</span> <strong>{{ $post->user->name }}</strong>
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
        <a href="#"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Leer más
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
</div>
