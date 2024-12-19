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
            <!-- Ciudad -->
            <div>
                <div class="mb-2 flex items-center gap-2">
                    <label for="your_city"
                        class="block text-sm font-medium text-gray-900 dark:text-white"> Ciudad </label>
                </div>
                <div class="relative">
                    <!-- Select con las opciones filtradas -->
                    <select id="your_city" wire:model.blur="form.your_city"
                        class="block w-full mt-2 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                        @if (count($filteredCities) > 0)
                            @foreach ($filteredCities as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
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
        <button type="submit">Guardar Datos</button>
    </form>

    <!-- Mensaje de éxito -->
    @if (session()->has('mensaje'))
        <div class="text-green-500">
            {{ session('mensaje') }}
        </div>
    @endif
</div>
{{-- [{"id":0,"departamento":"Amazonas","ciudades":["Leticia","Puerto Nari\u00f1o"]},{"id":1,"departamento":"Antioquia","ciudades":["Abejorral",...]},] --}}
