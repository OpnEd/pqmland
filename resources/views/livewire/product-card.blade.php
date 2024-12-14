<div
    class="group relative rounded-lg w-full border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">

    @php
        $categoria = strtolower($product->category->name);
        $imagenes = $product->images;
        $descuentos = [];
        if ($product->discounts->isNotEmpty()) {
            foreach ($product->discounts as $discount) {
                $descuentos[] = $discount->name;
            }
        }
    @endphp

    <!-- Imagen del producto con ícono sobrepuesto -->
    <div class="relative h-56 w-full">
        <img class="mx-auto h-full transition-opacity duration-300 group-hover:opacity-40"
            src="{{ asset('storage/images/tienda/' . $categoria . '/' . $imagenes[0] . '.png') }}"
            alt="{{ $product->name }}" />
        <!-- Botón con ícono centrado -->
        <div
            class="absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            <a href="{{ route('articulo.show', $product) }}"
                class="rounded-xl bg-blue-500 bg-opacity-50 p-4 text-white hover:bg-opacity-75">
                Ver producto
                {{-- <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                    <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg> --}}
            </a>
        </div>
    </div>

    <!-- Contenido de la card -->
    {{-- <div class="pt-6 transition-opacity duration-300 group-hover:opacity-40"> --}}
    <div class="pt-6">
        <div class="mb-4 flex items-center justify-center gap-4">
            <span
                class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                {{ implode(', ', $descuentos) }}
            </span>
        </div>
        <div class="mb-4 flex items-center justify-center gap-4">
            <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                {{ $product->name }}
            </a>
        </div>

        <div class="mt-4 flex items-center justify-between gap-2">
            <p class="text-xl font-bold leading-tight text-gray-900 dark:text-white">
                ${{ number_format( $this->viewPrice() ) }}</p>

            <div class="flex items-center justify-end gap-1">
                <livewire:favorite-products :product="$product" />
            </div>
        </div>
    </div>
</div>
