<div>
    @if (session()->has('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Campos del Perfil -->
        @foreach ($fields as $field)
            <div>
                <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">
                    {{ __(ucfirst(str_replace('_', ' ', $field))) }}
                </label>
                @if ($field === 'birth_date')
                    <input
                        type="date"
                        id="{{ $field }}"
                        wire:model.defer="user.{{ $field }}"
                        class="mt-3 block w-full border-gray-300 rounded-md shadow-sm">
                @else
                    <input
                        type="text"
                        id="{{ $field }}"
                        wire:model.defer="user.{{ $field }}"
                        class="mt-3 block w-full border-gray-300 rounded-md shadow-sm">
                @endif
                @error("user.$field") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endforeach

        <!-- Campo CV Published (Solo Superusuario) -->
        @can('manage-cv-published') <!-- Asume que tienes una política para superusuario -->
            <div>
                <label for="cv_published" class="block text-sm font-medium text-gray-700">
                    {{ __('Publicar CV') }}
                </label>
                <select id="cv_published" wire:model.defer="cv_published"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="0">{{ __('No') }}</option>
                    <option value="1">{{ __('Sí') }}</option>
                </select>
                @error('cv_published') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endcan

        <!-- Botón para guardar -->
        <button type="submit"
            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            {{ __('Guardar Cambios') }}
        </button>
    </form>
</div>
