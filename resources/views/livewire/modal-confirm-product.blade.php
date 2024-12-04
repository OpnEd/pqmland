<div
    x-data="{ open: @entangle('mostrarModal') }"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75"
>
    <div class="bg-white rounded-lg shadow-xl max-w-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Desea agregar el producto <span class="text-indigo-600">{{ $productoNombre }}</span> al carrito?
        </h2>
        <div class="flex justify-end gap-4">
            <button
                wire:click="cerrarModal"
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400"
            >
                Cancelar
            </button>
            <button
                wire:click="agregarProductoConfirmado"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700"
            >
                Confirmar
            </button>
        </div>
    </div>
</div>
