<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Nosotros')

    <
        class="!bg-gradient-to-r from-blue-900 via-blue-800 to-blue-500 min-h-screen text-white flex flex-col items-center justify-center">

        <!-- Icono o ilustración de éxito -->
        <div class="bg-white rounded-full p-6 mb-6 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <!-- Título -->
        <h1 class="text-4xl font-bold mb-4">¡Gracias por tu compra!</h1>

        @if ($status === 'success')

            <h1 class="text-4xl font-bold mb-4">¡Gracias por tu compra!</h1>
            <p>{{ $mensaje }}</p>

            <!-- Subtítulo -->
            <p class="text-lg text-blue-100 text-center max-w-xl mb-8">
                De esta forma nos apoyas para poder continuar con la importante labor de promover el uso adecuado de los
                medicamentos en Colombia.
            </p>
            <div class="bg-white text-gray-900 rounded-lg shadow-lg p-6 w-full max-w-2xl">
                <h2 class="text-2xl font-semibold mb-4">Detalles del Pedido</h2>
                <p class="mb-2"><strong>Número de Pedido:</strong> {{ $pedido->id }}</p>
                <p class="mb-2"><strong>Total Pagado:</strong> ${{ number_format($pedido->total, 2) }}</p>

                <h3 class="text-xl font-semibold mt-6 mb-4">Productos:</h3>
                <ul class="list-disc list-inside">
                    @foreach ($pedido->detalles as $detalle)
                        <li>
                            {{ $detalle->producto->nombre }} -
                            {{ $detalle->cantidad }} x ${{ number_format($detalle->precio_unitario, 2) }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @elseif ($status === 'error')
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Hubo un problema al procesar tu compra</p>
                <p>{{ $error }}</p>
            </div>
        @endif
        <!-- Botón de acción -->
        <a href="/"
            class="px-6 py-3 bg-white text-blue-700 font-semibold text-lg rounded-lg shadow-lg hover:bg-blue-100 transition duration-300">
            Volver a la página principal
        </a>

        <!-- Footer o mensaje adicional -->
        <div class="mt-12 text-sm text-blue-200">
            Si tienes alguna duda sobre tu pedido, contáctanos a través de nuestro <a href="{{ route('contacto') }}"
                class="underline hover:text-blue-100">formulario de contacto</a>.
        </div>
        <div class="mt-6 text-sm text-blue-200">
            Para hacer seguimiento a tu pedido <a href="{{ route('login') }}"
                class="underline hover:text-blue-100">inicia sesión</a>.
        </div>

</div>

</div>
