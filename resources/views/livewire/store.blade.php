<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Tienda')


    <div class="grid gap-4">
        @if (session('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 7000)"
             class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p>{{ session('status') }}</p>
        </div>
    @endif

        <div>
            <img class="h-auto max-w-full rounded-lg"
                src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
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
