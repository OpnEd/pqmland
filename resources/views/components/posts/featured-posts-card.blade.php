@props(['featuredPost'])

<article class="card my-5">
    <div class="flex items-center justify-between px-4 h-14">

        <h3 class="text-lg font-bold w-[50%] truncate">{{ $featuredPost->category->name }}</h3>

        <div class="text-sm text-gray-500 ">
            <a href="{{ route('post.show', $featuredPost) }}" class="hover:underline"
                target="blank">Leer más</a>
        </div>
    </div>
    <figure>
        <a href="">
            <img class="w-full" src="https://live.staticflickr.com/65535/50618365686_36f887ab88_c.jpg"
                alt="">

                <div class="absolute top-16 left-8 bg-black bg-opacity-50 text-white rounded px-2 py-1 flex flex-col items-center">
                    <span class="text-lg font-bold">{{ \Carbon\Carbon::parse($featuredPost->created_at)->format('d') }}</span>
                    <span class="text-xs">{{ \Carbon\Carbon::parse($featuredPost->created_at)->translatedFormat('M Y') }}</span>
                </div>
        </a>
    </figure>
    <div class="p-4 pb-2">
        <p class="text-3xl mb-5 px-4 font1">{{ $featuredPost->title }}</p>
        <a class="flex items-center gap-1 mb-6" href="{{ route('curriculo.user', $featuredPost->author->slug) }}">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.99 9H15M8.99 9H9m12 3a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM7 13c0 1 .507 2.397 1.494 3.216a5.5 5.5 0 0 0 7.022 0C16.503 15.397 17 14 17 13c0 0-1.99 1-4.995 1S7 13 7 13Z"/>
            </svg>
            <span class="font-bold hover:underline">{{ $featuredPost->author->name .' '. $featuredPost->author->last_name }}</span>
        </a>
        <div class="flex items-center justify-between text-sm px-2">
            <div class="px-4 flex items-center gap-2 text-sm mb-5">
                @foreach ($featuredPost->tags as $tag)
                    <a class="bg-indigo-200 rounded-full px-3 py-1 hover:bg-gray-500 hover:text-white"
                    href="">{{ $tag }}</a>
                @endforeach
            </div>
            <div class="flex items-center gap-4 [&>a:hover]:underline">
                <button class="relative inline-flex items-center justify-center p-2 text-sm font-medium leading-none dark:text-white text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-600 dark:bg-indigo-100 dark:hover:bg-indigo-200 dark:focus:ring-indigo-100">
                    <span class="sr-only">
                        Comments
                    </span>
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/>
                    </svg>
                    <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-gray-100 bg-gray-600 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-300">{{ $featuredPost->comments->count() }}</div>
                </button>
                <livewire:favorite-posts :post="$featuredPost" />
            </div>
        </div>
    </div>
</article>
