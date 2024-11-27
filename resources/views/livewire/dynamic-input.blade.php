<div>
    <h3 class="text-lg font-semibold">{{ __(ucfirst($section)) }}</h3>

    <!-- Lista de entradas dinámicas -->
    <div class="space-y-4">
        @foreach ($entries as $index => $entry)
            <div class="border p-4 rounded-md space-y-2">
                @foreach ($fields as $field)
                    <div>
                        <label for="{{ $field }}_{{ $index }}" class="block text-sm font-medium text-gray-700">
                            {{ __(ucfirst($field)) }}
                        </label>
                        <input
                            type="text"
                            id="{{ $field }}_{{ $index }}"
                            wire:model="entries.{{ $index }}.{{ $field }}"
                            class="mt-1 block w-full border-gray-300 rounded-md"
                            placeholder="{{ __('Ingrese ') . __(ucfirst($field)) }}"
                        />
                    </div>
                @endforeach
                @if (!isset($entry['id'])) <!-- Solo mostrar si el registro tiene un ID -->
                    <button
                        type="button"
                        class="mt-4 bg-indigo-500 text-white px-4 py-1 rounded hover:bg-indigo-600"
                        wire:click="removeEntry({{ $index }})"
                    >
                        {{ __('Descartar Formulario') }}
                    </button>
                @endif

                <!-- Botón para eliminar un registro de la base de datos -->
                @if (isset($entry['id'])) <!-- Solo mostrar si el registro tiene un ID -->
                    <button
                        type="button"
                        class="mt-4 bg-red-500 text-white ml-2 px-4 py-1 rounded hover:bg-red-700"
                        onclick="confirm('¿Estás seguro de que deseas eliminar este registro?') || event.stopImmediatePropagation()"
                        wire:click="deleteEntry({{ $entry['id'] }})"
                    >
                        {{ __('Eliminar Registro') }}
                    </button>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Botón para agregar una nueva entrada -->
    <button
        type="button"
        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        wire:click="addEntry"
    >
        {{ __('Agregar') }}
    </button>

    <!-- Botón para guardar -->
    <button
        type="button"
        class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
        wire:click="save"
    >
        {{ __('Guardar') }}
    </button>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif
</div>
