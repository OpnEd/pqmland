<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Contacto')
    <section class="bg-white dark:bg-gray-900">
        <div x-data="{ open: false, message: '' }"
            @message-sent.window="open = true; message = $event.detail[0].message; $nextTick(() => $refs.modal.focus())"
            class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us
            </h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical
                issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.
            </p>
            <form wire:submit.prevent="save" class="space-y-8">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                        name</label>
                    <input type="text" wire:model.defer="form.name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="Clark Kent">
                    <div>
                        @error('form.name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                        email</label>
                    <input type="email" wire:model.defer="form.email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="kent@example.com">
                    <div>
                        @error('form.email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="subject"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                    <input type="text" wire:model.defer="form.subject"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="Let us know how we can help you">
                    <div>
                        @error('form.subject')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                        message</label>
                    <textarea wire:model.defer="form.message" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Leave a comment..."></textarea>
                    <div>
                        @error('form.message')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-row gap-3">
                    <button type="submit"
                        class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send
                        message</button>
                </div>
            </form>
            <!-- Modal -->
            <div x-show="open" x-cloak
                class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50" x-transition>
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative" tabindex="-1" x-ref="modal">
                    <!-- Botón de cierre (X) -->
                    <button @click="open = false"
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Título -->
                    <h2 class="text-lg font-bold text-gray-800 mb-4 text-center">¡Mensaje enviado!</h2>

                    <!-- Mensaje -->
                    <p class="mb-6 text-gray-600 text-center" x-text="message"></p>

                    <!-- Botones de acción -->
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('tienda') }}"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition">
                            Ir a la tienda
                        </a>
                        <a href="{{ route('blog') }}"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition">
                            Ir al blog
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
                x-transition>
                <div class="bg-white rounded-lg p-6 max-w-md w-full" tabindex="-1" x-ref="modal">
                    <h2 class="text-lg font-bold mb-4">Mensaje enviado!</h2>
                    <p class="mb-4" x-text="message"></p>
                    <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded">Cerrar</button>
                    <a href="{{ route('tienda') }}" class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition">Ir a la tienda</a>
                    <a href="{{ route('blog') }}" class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition">Ir al blog</a>
                </div>
            </div> --}}
        </div>
    </section>
</div>
