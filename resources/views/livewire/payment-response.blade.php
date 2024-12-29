<div class="container mx-auto py-10">
    {{-- @if ($estadoTx === 'Error validando la firma digital.')
        <h1>Error validando la firma digital.</h1>
    @else --}}
    <h2>Resumen de la transacción</h2>
    <table>
        <tr>
            <td>Estado de la transacción</td>
            <td>{{ $estadoTx }}</td>
        </tr>
        <tr>
            <td>ID de la transacción</td>
            <td>{{ $payuResponse['transactionId'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Referencia de venta</td>
            <td>{{ $payuResponse['reference_pol'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Referencia de la transacción</td>
            <td>{{ $payuResponse['referenceCode'] ?? 'N/A' }}</td>
        </tr>
        @if (!empty($payuResponse['pseBank']))
            <tr>
                <td>cus</td>
                <td>{{ $payuResponse['cus'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Banco</td>
                <td>{{ $payuResponse['pseBank'] }}</td>
            </tr>
        @endif
        <tr>
            <td>Valor total</td>
            <td>${{ number_format($payuResponse['TX_VALUE'] ?? 0, 2) }}</td>
        </tr>
        <tr>
            <td>Moneda</td>
            <td>{{ $payuResponse['currency'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td>{{ $payuResponse['description'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Entidad</td>
            <td>{{ $payuResponse['lapPaymentMethod'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Validaciód de firma</td>
            @if ($validacionFirma)
                <td style="background-color: green; color: white">Firma validada exitosamente!</td>
            @else
                <td style="background-color: red; color: white">No se ha podido validar la firma</td>
            @endif
        </tr>
    </table>
    {{-- @endif --}}
</div>

{{-- @php
    $status = session('orderStatus');
    $message = session('mensaje');
@endphp
<div class="space-y-4">
    @section('pageDescription', 'Esta es una descripción específica para la página Nosotros')

    <div
        class="!bg-gradient-to-r from-blue-900 via-blue-800 to-blue-500 min-h-screen text-white flex flex-col items-center justify-center pb-12">

        <!-- Icono o ilustración de éxito -->
        <div class="bg-white rounded-full p-6 my-6 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        @if (in_array($status, ['COMPLETED', 'PENDING', 'IN_PROGRESS']))

            <h1 class="text-4xl font-bold mb-4">¡Gracias por tu compra!</h1>
            <span class="bg-green-100 text-green-700 rounded-lg py-2 px-6 mb-6">{{ $message }}</span>

            <!-- Subtítulo -->
            <p class="text-lg text-blue-100 text-center max-w-xl mb-8">
                De esta forma nos apoyas para poder continuar con la importante labor de promover el uso adecuado de los
                medicamentos en Colombia.
            </p>
            <div class="bg-white text-gray-900 rounded-lg shadow-lg p-6 w-full max-w-2xl">
                <h2 class="text-2xl font-semibold mb-4">Detalles del Pedido</h2>
                <p class="mb-2"><strong>Número de Pedido:</strong> {{ $guest_pedido->id }}</p>
                <p class="mb-2"><strong>Total Pagado:</strong> ${{ number_format($guest_pedido->total, 2) }}</p>

                <h3 class="text-xl font-semibold mt-6 mb-4">Productos:</h3>
                <table class="w-full border-collapse border border-dashed border-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-dashed border-gray-400 px-4 py-2">#</th>
                            <th class="border border-dashed border-gray-400 px-4 py-2">Cantidad</th>
                            <th class="border border-dashed border-gray-400 px-4 py-2">Producto</th>
                            <th class="border border-dashed border-gray-400 px-4 py-2">Precio Unitario Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guest_pedido->guestDetalles as $index => $detalle)
                            <tr>
                                <td class="border border-dashed border-gray-400 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border border-dashed border-gray-400 px-4 py-2 text-center">{{ $detalle->cantidad }}</td>
                                <td class="border border-dashed border-gray-400 px-4 py-2 text-center">{{ $detalle->producto->name }}</td>
                                <td class="border border-dashed border-gray-400 px-4 py-2 text-center">${{ number_format($detalle->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif (in_array($status, ['FAILED', 'DENIED']))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p class="font-bold">Hubo un problema al procesar tu compra</p>
                <p>{{ $error }}</p>
            </div>
        @else
            <p class="text-lg text-yellow-300 text-center max-w-xl mb-8">
                Lo sentimos, en este lugar no tenemos información sobre tu compra. Por favor, inicia sesión y ve al
                escritorio o contacta
                al área de ventas.
            </p>
            <div class="pb-6">
                <img src="{{ asset('storage/images/qr/qr-whatsapp.jpg') }}" alt="WhatsApp 3143095251">
            </div>
        @endif
        <!-- Botón de acción -->
        <a href="/"
            class="px-6 py-3 mt-6 bg-white text-blue-700 font-semibold text-lg rounded-lg shadow-lg hover:bg-blue-100 transition duration-300">
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
 --}}
