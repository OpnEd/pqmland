<section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
    @php
        $categoria = strtolower($product->category->name);
        $imagenes = $product->images;
        use League\CommonMark\CommonMarkConverter;
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    @endphp

    <div class="max-w-screen-xl mt-3 px-4 mx-auto 2xl:px-0">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                <img class="w-full dark:hidden"
                    src="{{ asset('storage/images/tienda/' . $categoria . '/' . $imagenes[0] . '.png') }}"
                    alt="{{ $product->name }}" />
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    {{ $product->name }}
                </h1>
                <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                        $ {{ number_format($product->sell_price) }}
                    </p>

                    <div class="flex items-center gap-2 mt-2 sm:mt-0">
                    </div>
                </div>

                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    {{-- <a href="#" title=""
                        class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                        </svg>
                        A favoritos
                    </a> --}}

                    <div class="max-w-xs mx-auto flex flex-row items-center justify-center gap-4">

                        <div class="flex flex-row justify-center items-center">
                            <p>Cantidad:&nbsp;&nbsp; </p>
                            <button wire:click="decrement" type="button"
                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <p>&nbsp;&nbsp;
                                {{ $cantidad }}
                                &nbsp;&nbsp;</p>
                            <button wire:click="increment" type="button"
                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>

                        <button wire:click="agregarProducto( {{ $product->id }}, {{ $cantidad }} )"
                            class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>

                            Agregar
                        </button>

                    </div>
                </div>

                <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
                @php
                    echo $converter->convert($product->description);
                @endphp
            </div>
        </div>
    </div>
    <div x-data="{ open: @entangle('modalExito') }"
        x-show="open"
        x-cloak
        x-transition
        x-init="$watch('open', value => {
            if (value) setTimeout(() => open = false, 5000);
        })"
        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm text-center">
            <!-- Ícono de éxito -->
            <div class="text-green-500 mb-4 rounded-full items-center justify-center">
                <img src="{{ asset('storage/images/tienda/success.png') }}" alt="Agregado!">
            </div>

            <!-- Mensaje -->
            <h2 class="text-xl font-bold text-gray-800">¡Producto Agregado!</h2>
            <p class="text-gray-600 mt-2">
                El producto <span class="font-semibold text-indigo-600">{{ $productoAgregado }}</span> fue añadido al
                carrito.
            </p>

            <!-- Botón cerrar -->
            <button x-on:click="open = false"
                class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Aceptar
            </button>
        </div>
    </div>

</section>
