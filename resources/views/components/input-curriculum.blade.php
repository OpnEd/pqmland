<div>
    <h3 class="text-lg font-semibold">{{ $title }}</h3>
    <div class="mt-4 space-y-4">
        @foreach ($items as $index => $item)
            <div class="flex flex-col space-y-2 border p-4 rounded-md">
                <!-- Inputs para cada campo -->
                @foreach ($fields as $field)
                    <div>
                        <label for="{{ $field }}_{{ $index }}" class="block text-sm font-medium text-gray-700">
                            {{ ucfirst($field) }}
                        </label>
                        <input
                            type="text"
                            id="{{ $field }}_{{ $index }}"
                            wire:model="items.{{ $index }}.{{ $field }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                            placeholder="Ingresa {{ $field }}"
                        />
                    </div>
                @endforeach

                <!-- Botón para eliminar el elemento -->
                <button
                    type="button"
                    class="text-red-600 text-sm mt-2"
                    wire:click="removeItem({{ $index }})"
                >
                    Eliminar
                </button>
            </div>
        @endforeach
    </div>

    <!-- Botón para agregar un nuevo elemento -->
    <button
        type="button"
        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        wire:click="addItem"
    >
        Agregar {{ $title }}
    </button>
</div>
