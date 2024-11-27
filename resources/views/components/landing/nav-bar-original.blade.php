<nav x-data="{ movilenavOpen: false }" class="bg-white border-gray-200 dark:bg-gray-900">
    @php
        $categories = config('categories');
    @endphp
    <div class="md:flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <div class="flex justify-between items-center h-20 w-full">
            <a href="{{ route('inicio') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-application-logo class="w-15 h-15 fill-current text-gray-500" />
                <span class="hidden self-center text-4xl text-indigo-500 font3 whitespace-nowrap dark:text-white">PQM</span>
            </a>
            <div class="md:hidden">
                <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                    class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Cart
                    </span>
                    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <span class="hidden sm:flex">My Cart</span>
                    <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <div id="myCartDropdown1"
                    class="hidden z-500 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                iPhone 15</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$599</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                            <button data-tooltip-target="tooltipRemoveItem1a" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem1a" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                iPad Air</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$499</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                            <button data-tooltip-target="tooltipRemoveItem2a" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem2a" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                Watch SE</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$598</p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 2</p>

                            <button data-tooltip-target="tooltipRemoveItem3b" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem3b" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Sony
                                Playstation 5</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$799
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                            <button data-tooltip-target="tooltipRemoveItem4b" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem4b" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div>
                            <a href="#"
                                class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                iMac 20"</a>
                            <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$8,997
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-6">
                            <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 3</p>

                            <button data-tooltip-target="tooltipRemoveItem5b" type="button"
                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                <span class="sr-only"> Remove </span>
                                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="tooltipRemoveItem5b" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Remove item
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>

                    <a href="#" title=""
                        class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                        role="button"> Proceed to Checkout </a>
                </div>
            </div>
            <mobileicon class="md:hidden">
                <a @click="movilenavOpen = !movilenavOpen"
                    class="h-12 w-12 flex items-center justify-center cursor-pointer hover:bg-indigo-200 rounded-lg">
                    <img x-show="!movilenavOpen" class="w-6 h-6 select-none"
                        src="https://img.icons8.com/small/64/menu.png">
                    <img x-show="movilenavOpen" x-cloak class="w-6 h-6 select-none"
                        src="https://img.icons8.com/small/64/delete-sign.png">
                </a>
            </mobileicon>
            <nav class="hidden md:!block bg-gray-100 rounded-lg px-3 md:h-auto md:w-auto">
                <ul
                    class="flex items-center navitems flex-col md:flex-row gap-8 md:gap-0 justify-center h-full -translate-y-10 md:translate-y-0 font5">
                    <li>
                        <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                            class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                            <span class="sr-only">
                                Cart
                            </span>
                            <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                            </svg>
                            <span class="hidden sm:flex">My Cart</span>
                            <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 9-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="myCartDropdown1"
                            class="hidden z-500 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        iPhone 15</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$599</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                                    <button data-tooltip-target="tooltipRemoveItem1a" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem1a" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        iPad Air</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$499</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                                    <button data-tooltip-target="tooltipRemoveItem2a" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem2a" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        Watch SE</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$598</p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 2</p>

                                    <button data-tooltip-target="tooltipRemoveItem3b" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem3b" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Sony
                                        Playstation 5</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$799
                                    </p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                                    <button data-tooltip-target="tooltipRemoveItem4b" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem4b" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div>
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                        iMac 20"</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$8,997
                                    </p>
                                </div>

                                <div class="flex items-center justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 3</p>

                                    <button data-tooltip-target="tooltipRemoveItem5b" type="button"
                                        class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                        <span class="sr-only"> Remove </span>
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="tooltipRemoveItem5b" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                        Remove item
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" title=""
                                class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                role="button"> Proceed to Checkout </a>
                        </div>
                    </li>
                    <li>
                        <p class="text-sm text-gray-500 dark:text-white px-6">(57) 314 309 5251</p>
                    </li>
                    <li>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
            <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': movilenavOpen, 'hidden': !movilenavOpen }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('inicio')" :active="request()->routeIs('inicio')" wire:navigate>
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('nosotros')" :active="request()->routeIs('nosotros')" wire:navigate>
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')" wire:navigate>
                    {{ __('Blog') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tienda')" :active="request()->routeIs('tienda')" wire:navigate>
                    {{ __('Store') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contacto')" :active="request()->routeIs('contacto')" wire:navigate>
                    {{ __('Contact') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
        </div>
        {{-- <nav x-show="movilenavOpen" x-cloak
            class="md:!block bg-gray-100 rounded-lg px-3 inset-0  h-screen w-screen md:h-auto md:w-auto absolute md:relative -translate-x-7"
            x-transition:enter="duration-300 esae-out" x-transition:enter-start="opacity-0 -translate-y-96"
            x-transition:enter-end="opacity-100 -translate-y-0">
            <ul
                class="flex items-center navitems flex-col md:flex-row gap-8 md:gap-0 justify-center h-full -translate-y-10 md:translate-y-0 font5">
                <li>
                    <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                        class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                        <span class="sr-only">
                            Cart
                        </span>
                        <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                        <span class="hidden sm:flex">My Cart</span>
                        <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="myCartDropdown1"
                        class="hidden z-500 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                        <div class="grid grid-cols-2">
                            <div>
                                <a href="#"
                                    class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                    iPhone 15</a>
                                <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$599</p>
                            </div>

                            <div class="flex items-center justify-end gap-6">
                                <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                                <button data-tooltip-target="tooltipRemoveItem1a" type="button"
                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                    <span class="sr-only"> Remove </span>
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="tooltipRemoveItem1a" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                    Remove item
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div>
                                <a href="#"
                                    class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                    iPad Air</a>
                                <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$499</p>
                            </div>

                            <div class="flex items-center justify-end gap-6">
                                <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                                <button data-tooltip-target="tooltipRemoveItem2a" type="button"
                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                    <span class="sr-only"> Remove </span>
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="tooltipRemoveItem2a" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                    Remove item
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div>
                                <a href="#"
                                    class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                    Watch SE</a>
                                <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$598</p>
                            </div>

                            <div class="flex items-center justify-end gap-6">
                                <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 2</p>

                                <button data-tooltip-target="tooltipRemoveItem3b" type="button"
                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                    <span class="sr-only"> Remove </span>
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="tooltipRemoveItem3b" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                    Remove item
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div>
                                <a href="#"
                                    class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Sony
                                    Playstation 5</a>
                                <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$799
                                </p>
                            </div>

                            <div class="flex items-center justify-end gap-6">
                                <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 1</p>

                                <button data-tooltip-target="tooltipRemoveItem4b" type="button"
                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                    <span class="sr-only"> Remove </span>
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="tooltipRemoveItem4b" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                    Remove item
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div>
                                <a href="#"
                                    class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">Apple
                                    iMac 20"</a>
                                <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">$8,997
                                </p>
                            </div>

                            <div class="flex items-center justify-end gap-6">
                                <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty: 3</p>

                                <button data-tooltip-target="tooltipRemoveItem5b" type="button"
                                    class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                    <span class="sr-only"> Remove </span>
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="tooltipRemoveItem5b" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                    Remove item
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>

                        <a href="#" title=""
                            class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            role="button"> Proceed to Checkout </a>
                    </div>
                </li>
                <li>
                    <p class="text-sm text-gray-500 dark:text-white px-6">(57) 314 309 5251</p>
                </li>
                <li>
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </li>
                @auth()
                    <li x-data="{ dropdownOpen: false }" class="relative">
                        <a @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false"
                            class="flex items-center gap-2 cursor-pointer select-none">
                            <img class="h-8 rounded-full object-cover bg-teal-200"
                                src="https://img.icons8.com/doodle/96/null/bart-simpson.png" />
                            Bart
                            <img x-bind:class="dropdownOpen ? 'rotate-180 duration-300' : ''" class="w-4"
                                src="https://img.icons8.com/small/32/777777/expand-arrow.png" />
                        </a>
                        <div x-show="dropdownOpen" x-cloak
                            class="absolute right-0 bg-white text-black shadow rounded-lg w-40 p-2 z-10"
                            x-transition:enter="duration-300 esae-out"
                            x-transition:enter-start="opacity-0 -translate-y-5 scale-90"
                            x-transition:enter-end="opacity-100 -translate-y-0 scale-100">
                            <ul class="hoverlist [&>li>a]:justify-end">
                                <li><a href="">My profile</a></li>
                                <li><a href="">Log out</a></li>
                            </ul>
                        </div>
                    </li>
                @endauth
                @foreach ($links as $link)
                    <li>
                        <div class="md:hidden hoverlist">
                            <x-landing.link :ruta="$link['route']" :texto="$link['name']" :clase="$link['class'] ?? ''" :target="$link['target'] ?? '_self'" />
                        </div>
                    </li>
                @endforeach
                <li class="relative flex items-center">
                    <div class="md:hidden hoverlist">
                        <div x-data="{ open: false }" class="inline-flex rounded-md shadow-sm">
                            <a href="{{ route('tienda') }}"
                                class="px-4 py-2 bg-indigo-500 text-white rounded-l-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Tienda
                            </a>
                            <button @click="open = !open"
                                class="px-4 py-2 bg-indigo-500 text-white rounded-r-md border-l border-indigo-600 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <img x-bind:class="open ? 'rotate-180 duration-300' : ''" class="w-4"
                                    src="https://img.icons8.com/small/32/FFFFFF/expand-arrow.png" />
                            </button>
                            <div x-show="open" @click.away="open = false" x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1" role="menu" aria-orientation="vertical"
                                    aria-labelledby="options-menu">
                                    @foreach ($categories as $category)
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                                            role="menuitem">{{ $category['name'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav> --}}
    </div>
</nav>
<nav class="hidden items-center justify-between md:block bg-gray-100 dark:bg-gray-700 h-18">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row items-center font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm navitems">
                @foreach ($links as $link)
                    <li>
                        <x-landing.link :ruta="$link['route']" :texto="$link['name']" :clase="$link['class'] ?? ''" :target="$link['target'] ?? '_self'" />
                    </li>
                @endforeach
                <li>
                    <div x-data="{ open: false }" class="inline-flex rounded-md shadow-sm">
                        <a href="{{ route('tienda') }}"
                            class="px-4 py-2 rounded-l-md {{ request()->routeIs('tienda') ? 'bg-indigo-700 text-white border-indigo-800' : 'bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2' }}">
                            Tienda
                        </a>
                        <button @click="open = !open"
                            class="px-4 py-2 bg-indigo-500 text-white rounded-r-md border-l border-indigo-600 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <img x-bind:class="open ? 'rotate-180 duration-300' : ''" class="w-4"
                                src="https://img.icons8.com/small/32/FFFFFF/expand-arrow.png" />
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-40">
                            <div class="py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="options-menu">
                                @foreach ($categories as $category)
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                                        role="menuitem">{{ $category['name'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
