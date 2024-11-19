@props(['featuredPost'])

<article class="card my-5">
    <div class="flex items-center justify-between px-4 h-14">
        <h3 class="text-lg font-bold w-[50%] truncate">Título Elegante</h3>
        <div class="text-sm text-gray-500 ">Hola<a href="" class="hover:underline"
                target="blank">Leer más</a></div>
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
        <a class="flex items-center gap-1 mb-4" href="">
            <img class="w-8 h-8 rounded-full" src="https://img.icons8.com/small/96/A9A9A9/happy.png"
                alt="">
            <span class="font-bold hover:underline">Richard</span>
        </a>
        <p class="text-5xl mb-10 px-4 font1">Título de prueba</p>
        <div class="px-4 flex items-center gap-2 text-sm mb-5">
            <a class="bg-gray-200 rounded-full px-3 py-1 hover:bg-gray-500 hover:text-white"
                href="">URM</a>
            <a class="bg-gray-200 rounded-full px-3 py-1 hover:bg-gray-500 hover:text-white"
                href="">Indicadores</a>
        </div>
        <div class="flex items-center justify-between text-sm px-2">
            <a class="font-bold hover:underline" href="">Comments<span
                    class="font-light text-gray-500 ml-2">3</span></a>
            <div class="flex items-center gap-4 [&>a:hover]:underline">
                <div class="flex items-center gap-1">
                    <img class="w-5 -mt-1"
                        src="https://img.icons8.com/?size=100&id=HtMJD4UUPVM3&format=png&color=000000">1
                </div>
                <a href="">Like</a>
                <a href="">Edit</a>
                <a href="">Delete</a>
            </div>
        </div>
    </div>
</article>
