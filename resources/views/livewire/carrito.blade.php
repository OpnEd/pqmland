<div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 md:px-16 max-w-7xl mx-auto mt-6">
    @if (empty($carrito))
        <p>No tienes productos en el carrito.</p>
    @else
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio Unit.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio total
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrito as $id => $item)
                    {{-- {{dd($item['imagenes'])}} --}}
                    <tr {{-- {{dd(Storage::url("images/tienda/{$item['categoria']}/{$item['imagenes'][0] }"))}} --}}
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            @php
                                $imageUrl = isset($item['imagenes'])
                                    ? Storage::url("images/tienda/{$item['categoria']}/{$item['imagenes']}.png")
                                    : Storage::url('images/tienda/default-image.png');
                            @endphp
                            <img src="{{ $imageUrl }}" class="w-12 md:w-28 max-w-full max-h-full"
                                alt="{{ $item['nombre'] }}">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{ $item['nombre'] }}
                        </td>
                        <td class="px-6 py-4">
                            <input
                                type="number"
                                min="1"
                                value="{{ $item['cantidad'] }}"
                                wire:change="actualizarCantidad({{ $id }}, $event.target.value)"
                                class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                       dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            ${{ number_format($item['precio'], 2) }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="eliminarProducto({{ $id }})"
                                class="text-red-500">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-gray-100 dark:bg-gray-800">
                    <td colspan="4" class="px-6 py-4 font-semibold text-right text-gray-900 dark:text-white">Total:</td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        ${{ number_format($this->total, 2) }}
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <div class="flex justify-center mt-6">
            <a wire:navigate href="{{ route('checkout') }}" class="bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:from-green-500 hover:to-green-700 text-white font-bold py-2 px-6 rounded-full shadow-lg hover:shadow-xl transition duration-300 ease-in-out mt-4 mb-12">
                Procesar Pedido
            </a>
        </div>
    @endif
</div>
