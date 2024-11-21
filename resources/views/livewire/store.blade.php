<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Tienda')


    <div class="grid gap-4">
        @if (session('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 7000)"
             class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <div x-data="carousel()" class="relative w-full">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div x-show="current === 0" class="hidden duration-700 ease-in-out" :class="{ 'block': current === 0, 'hidden': current !== 0 }">
                <img src="{{ asset('storage/images/carousel/compromiso.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <!-- Overlay text and button -->
                <div class="absolute top-1/2 left-1/4 transform -translate-x-1/2 -translate-y-1/2 text-left text-white">
                    <h3 class="text-xl font-bold font5 mb-4">Categoría 1</h3>
                    <p class="mb-4">Descripción corta de la categoría.</p>
                    <a href="{{ route('posts', ['category' => 'category-1']) }}" class="inline-block px-6 py-2 bg-gray-400 bg-opacity-40 rounded-lg text-white hover:bg-gray-700 focus:outline-none transition">Ver Productos</a>
                </div>
            </div>
            <!-- Item 2 -->
            <div x-show="current === 1" class="hidden duration-700 ease-in-out" :class="{ 'block': current === 1, 'hidden': current !== 1 }">
                <img src="{{ asset('storage/images/carousel/compromiso1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div x-show="current === 2" class="hidden duration-700 ease-in-out" :class="{ 'block': current === 2, 'hidden': current !== 2 }">
                <img src="{{ asset('storage/images/carousel/compromiso2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <template x-for="(item, index) in items" :key="index">
                <button @click="goTo(index)"
                    class="w-3 h-3 rounded-full"
                    :class="{ 'bg-blue-600': current === index, 'bg-gray-400': current !== index }"
                    aria-label="Slide indicator"></button>
            </template>
        </div>

        <!-- Slider controls -->
        <button @click="prev" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg class="w-4 h-4 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button @click="next" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                <svg class="w-4 h-4 text-white rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

        <div class="grid grid-cols-5 gap-4">
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
        </div>
    </div>

</div>
