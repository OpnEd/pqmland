<div x-data="{ open: @entangle('mostrarModal') }" x-show="open" x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
    <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-96 p-6">
        <img src="{{ asset('storage/images/tienda/login.png') }}" alt="">
        <h2 class="text-xl font-semibold text-gray-800">Inicia sesión</h2>
        <p class="mt-2 text-gray-600">Debes iniciar sesión para agregar productos a tus favoritos.</p>

        <div class="mt-4 flex justify-center space-x-4">
            <!-- Botón Cancelar -->
            <button wire:click="cerrarModal"
                class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancelar
            </button>

            <!-- Botón para ir a login -->
            <button wire:click="redirectToLogin" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Iniciar sesión
            </button>
        </div>
    </div>
</div>
