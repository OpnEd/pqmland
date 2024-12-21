<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">

    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0 space-y-4">
        <div>
            <ol
                class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
                <li
                    class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span
                        class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                        <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Carrito
                    </span>
                </li>

                <li
                    class="after:border-1 flex items-center text-gray-600 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span
                        class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                        <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Verificación
                    </span>
                </li>

                <li class="flex shrink-0 items-center">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Resumen de la orden
                </li>
            </ol>
        </div>
        <div class="mt-12">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>
            @if (empty($carrito))
                <p>No tienes productos en el carrito.</p>
            @else
                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

                    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                        <div class="space-y-6">
                            @foreach ($carrito as $id => $item)
                                <div
                                    class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:py-6 md:px-16">
                                    @php
                                        $imageUrl = isset($item['imagenes'])
                                            ? Storage::url("images/tienda/{$item['categoria']}/{$item['imagenes']}.png")
                                            : Storage::url('images/tienda/default-image.png');
                                    @endphp
                                    <div
                                        class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        <a href="#" class="shrink-0 md:order-1">
                                            <img src="{{ $imageUrl }}" class="w-12 md:w-16"
                                                alt="{{ $item['nombre'] }}">
                                        </a>

                                        <label for="counter-input" class="sr-only">Selecciona la cantidad:</label>
                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="px-6 py-4">
                                                <input type="number" min="1" value="{{ $item['cantidad'] }}"
                                                    wire:change="actualizarCantidad({{ $id }}, $event.target.value)"
                                                    class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                        focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1
                                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                            </div>
                                            <div class="text-end md:order-4 md:w-32">
                                                <p class="text-base font-bold text-gray-900 dark:text-white">
                                                    ${{ number_format($item['precio_unitario'] * $item['cantidad'], 2) }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                            <div class="flex flex-row gap-3">
                                                <a href="#"
                                                    class="text-base font-medium text-gray-900 hover:underline dark:text-white">
                                                    {{ $item['nombre'] }}
                                                </a>-
                                                <p class="text-base font-bold text-gray-900 dark:text-white">
                                                    ${{ number_format($item['precio_unitario']) }} / Und.</p>
                                            </div>
                                            @if ($item['impuestos'] > 0)
                                                <div>
                                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                                        Impuestos
                                                        <strong> ${{ number_format($item['impuestos']) }}</strong>
                                                    </p>
                                                </div>
                                            @endif
                                            @if ($item['descuentos'] > 0)
                                                <div>
                                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                                        Descuentos
                                                        <strong> ${{ number_format($item['descuentos']) }}</strong>
                                                    </p>
                                                </div>
                                            @endif
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                                                    <livewire:favorite-products />
                                                    Agregar a Favoritos
                                                </div>

                                                <button type="button"
                                                    wire:click="eliminarProducto({{ $id }})"
                                                    class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                                    <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                    Eliminar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="hidden xl:mt-8 xl:block">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                            <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
                                <div
                                    class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <a href="#" class="overflow-hidden rounded">
                                        <img class="mx-auto h-44 w-44 dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                            alt="imac image" />
                                        <img class="mx-auto hidden h-44 w-44 dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                            alt="imac image" />
                                    </a>
                                    <div>
                                        <a href="#"
                                            class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">iMac
                                            27”</a>
                                        <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This
                                            generation has some improvements, including a longer continuous battery life.
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                                            <span class="line-through"> $399,99 </span>
                                        </p>
                                        <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$299</p>
                                    </div>
                                    <div class="mt-6 flex items-center gap-2.5">
                                        <button data-tooltip-target="favourites-tooltip-1" type="button"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                                            </svg>
                                        </button>
                                        <div id="favourites-tooltip-1" role="tooltip"
                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                            Add to favourites
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button type="button"
                                            class="inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                            </svg>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                                <div
                                    class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <a href="#" class="overflow-hidden rounded">
                                        <img class="mx-auto h-44 w-44 dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-light.svg"
                                            alt="imac image" />
                                        <img class="mx-auto hidden h-44 w-44 dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-dark.svg"
                                            alt="imac image" />
                                    </a>
                                    <div>
                                        <a href="#"
                                            class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Playstation
                                            5</a>
                                        <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This
                                            generation has some improvements, including a longer continuous battery life.
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                                            <span class="line-through"> $799,99 </span>
                                        </p>
                                        <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$499</p>
                                    </div>
                                    <div class="mt-6 flex items-center gap-2.5">
                                        <button data-tooltip-target="favourites-tooltip-2" type="button"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                                            </svg>
                                        </button>
                                        <div id="favourites-tooltip-2" role="tooltip"
                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                            Add to favourites
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <button type="button"
                                            class="inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                            </svg>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                                <div
                                    class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <a href="#" class="overflow-hidden rounded">
                                        <img class="mx-auto h-44 w-44 dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                            alt="imac image" />
                                        <img class="mx-auto hidden h-44 w-44 dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                            alt="imac image" />
                                    </a>
                                    <div>
                                        <a href="#"
                                            class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple
                                            Watch Series 8</a>
                                        <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">This
                                            generation has some improvements, including a longer continuous battery life.
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                                            <span class="line-through"> $1799,99 </span>
                                        </p>
                                        <p class="text-lg font-bold leading-tight text-red-600 dark:text-red-500">$1199</p>
                                    </div>
                                    <div class="mt-6 flex items-center gap-2.5">
                                        <button data-tooltip-target="favourites-tooltip-3" type="button"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white p-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"></path>
                                            </svg>
                                        </button>
                                        <div id="favourites-tooltip-3" role="tooltip"
                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                            Add to favourites
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>

                                        <button type="button"
                                            class="inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                            </svg>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div
                            class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">Resumen de la Cuenta</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <!-- Subtotal -->
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                                            ${{ number_format($this->getSubtotalProperty(), 2) }}
                                        </dd>
                                    </dl>

                                    <!-- Descuentos Totales -->
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total
                                            Descuentos
                                        </dt>
                                        <dd class="text-base font-medium text-green-600">
                                            -${{ number_format($this->getTotalDescuentosProperty(), 2) }}
                                        </dd>
                                    </dl>

                                    <!-- Impuestos Totales -->
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total
                                            Impuestos
                                        </dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                                            ${{ number_format($this->getTotalImpuestosProperty(), 2) }}
                                        </dd>
                                    </dl>
                                </div>

                                <!-- Total Final -->
                                <dl
                                    class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        ${{ number_format($this->getTotalProperty(), 2) }}
                                    </dd>
                                </dl>
                            </div>

                            <!-- Botón para pagar -->
                            <button wire:click="checkOut"
                                class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Ir a pagar
                            </button>

                            <!-- Link para continuar seleccionando -->
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> o </span>
                                <a href="{{ route('tienda') }}" title=""
                                    class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                                    Continuar seleccionando
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>


                        <div
                            class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <form class="space-y-4">
                                <div>
                                    <label for="voucher"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Do you
                                        have a
                                        voucher or gift card? </label>
                                    <input type="text" id="voucher"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="" required />
                                </div>
                                <button type="submit"
                                    class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply
                                    Code</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Modal que informa que debes loguearte para darle like a un post -->

        @if ($registOrNot)
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
                <div class="relative bg-white flex flex-col items-center rounded-lg shadow-lg w-96 p-6">
                    <!-- Botón de cierre (X) -->
                    <button wire:click="cerrarModal"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <img src="{{ asset('storage/images/tienda/login.png') }}" alt="">

                    <h2 class="text-xl font-semibold text-gray-800">¿Deseas registrarte antes de comprar?</h2>
                    <p>Beneficios al registrarte:</p>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Historial de compras</li>
                        <li>Ofertas exclusivas</li>
                        <li>Agilidad en compras futuras</li>
                    </ul>
                    <div class="mt-4 flex justify-center space-x-4">
                        <a href="{{ route('checkout') }}"
                            class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-gray-300">
                            Continuar sin registrarse
                        </a>
                        <a href="{{ route('register') }}"
                            class="inline-block bg-blue-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-blue-700">
                            Registrarse y continuar
                        </a>
                        <a href="{{ route('login') }}"
                            class="inline-block bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-green-700">
                            Ya estoy registrado
                        </a>
                    </div>

                </div>
            </div>
        @endif
    </div>
</section>
