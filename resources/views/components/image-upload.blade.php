<div x-data="{ imagePreview: '{{ $imageUrl }}' }" class="flex flex-col items-center space-y-4">
    <!-- Imagen actual o previsualización -->
    <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-gray-300">
        <img
            x-bind:src="imagePreview || 'https://via.placeholder.com/150?text=Perfil'"
            alt="Foto de perfil"
            class="w-full h-full object-cover"
        />
    </div>

    <!-- Input para subir imagen -->
    <label class="block">
        <span class="sr-only">Elige una imagen</span>
        <input
            type="file"
            name="{{ $name }}"
            accept="image/*"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring focus:ring-blue-500"
            @change="imagePreview = URL.createObjectURL($event.target.files[0])"
        />
    </label>
</div>
