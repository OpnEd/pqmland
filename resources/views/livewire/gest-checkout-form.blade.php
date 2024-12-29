<div>
    <form wire:submit.prevent="guardarDatos" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!-- Nombre -->
            <div>
                <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                    Tu nombre </label>
                <input type="text" id="your_name" wire:model.blur="form.your_name"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="Juan Ramón Vargas" required />
                    @error('form.your_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Email -->
            <div>
                <label for="your_email"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Tu E-mail
                </label>
                <input type="email" id="your_email" wire:model.blur="form.your_email"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="name@ejemplo.com" required />
                    @error('form.your_email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Celular -->
            <div>
                <label for="your_phone"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> No. Celular
                </label>
                <input type="text" id="your_phone" wire:model.blur="form.your_phone"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                            placeholder="3143095251" required />
                            @error('form.your_phone') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Tipo de documento de identidad -->
            <div>
                <label for="document_type" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                    Tipo de documento de identidad </label>
                <select id="document_type" wire:model.blur="form.document_type"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                    <option value="" disabled>Selecciona el tipo de documento</option>
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="CE">Cédula de extranjería</option>
                    <option value="PA">Pasaporte</option>
                </select>
                @error('form.document_type') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Número de documento de identidad -->
            <div>
                <label for="document_number" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                    Número de documento de identidad </label>
                <input type="text" id="document_number" wire:model.blur="form.document_number"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="1234567890" required />
                    @error('form.document_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Ciudad -->
            <div>
                <div class="mb-2 flex items-center gap-2">
                    <label for="your_city"
                        class="block text-sm font-medium text-gray-900 dark:text-white"> Ciudad </label>
                </div>
                <div class="relative">
                    <select id="your_city" wire:model.blur="form.your_city"
                        class="block w-full mt-2 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                        <option value="" disabled>Selecciona tu ciudad</option>
                        @if (count($filteredCities) > 0)
                            @foreach ($filteredCities as $city)
                                <option value="{{ $city['city'] }}">
                                    <span class="text-gray-400">{{ $city['department'] }}:</span> {{ $city['city'] }}
                                </option>
                            @endforeach
                        @else
                            <option>No se encontraron resultados</option>
                        @endif
                    </select>
                </div>
            </div>
            <!-- Dirección -->
            <div>
                <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                    Dirección </label>
                <input type="text" id="address" wire:model.blur="form.address"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="Cl. 80 88 - 99" required />
                    @error('form.address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Empresa -->
            <div>
                <label for="company_name"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Nombre empresa
                </label>
                <input type="text" id="company_name" wire:model.blur="form.company_name"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                    placeholder="Hyperion SAS" />
                    @error('form.company_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Botón para guardar -->
        <button type="submit" class="mt-4 w-full rounded-lg bg-primary-600 py-2.5 px-4 text-sm font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-700 relative" wire:loading.class="opacity-50">
            <div wire:loading wire:target="guardarDatos" class="inline-flex items-center mr-2">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            </div>
            Guardar Datos
        </button>
    </form>

    <!-- Mensaje de éxito -->
    @if (session()->has('mensajeCompleto'))
        <div class="mt-4 w-full rounded-lg bg-green-100 p-4 text-sm font-thin text-center text-green-700">
            {{ session('mensajeCompleto') }}
        </div>
    @elseif (session()->has('mensajeIncompleto'))
        <div class="mt-4 w-full rounded-lg bg-red-100 p-4 text-sm font-thin text-center text-red-700">
            {{ session('mensajeIncompleto') }}
        </div>
    @endif
</div>
{{-- [{"id":0,"departamento":"Amazonas","ciudades":["Leticia","Puerto Nari\u00f1o"]},{"id":1,"departamento":"Antioquia","ciudades":["Abejorral",...]},] --}}
