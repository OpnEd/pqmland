<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.nav.dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <p>Hola {{ auth()->user()->name .', '. __("messages.messages.welcome") }}</p>
                </div>
            </div>
             <!-- Contenedor con grid de dos columnas -->
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <p>Detalles para el pago</p>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-full md:col-span-1 bg-gray-100 p-4 rounded-lg order-1 md:order-1">
                            <!-- Contenido de la primera columna -->
                            <livewire:user-checkout-form />
                        </div>
                        <div class="col-span-full md:col-span-1 bg-gray-100 p-4 rounded-lg order-2 md:order-2">
                            <!-- Contenido de la segunda columna -->
                            <div class="my-3 divide-y divide-gray-200 dark:divide-gray-800">
                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        ${{ number_format($this->getSubtotalProperty(), 2) }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total
                                        Descuentos</dt>
                                    <dd class="text-base font-medium text-green-500">
                                        -${{ number_format($this->getTotalDescuentosProperty(), 2) }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total
                                        Impuestos</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        ${{ number_format($this->getTotalImpuestosProperty(), 2) }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4 py-3">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        ${{ number_format($this->getTotalProperty(), 2) }}</dd>
                                </dl>
                            </div>
                            <!-- Contenedor del botón de PayPal -->
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'pay',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "description": "Compra en PQM - Pharmaceutical Quality Management",
                        "amount": {
                            "currency_code": "USD",
                            "value": {{ $this->getTotalProperty() }}
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    //alert('Pago exitoso!');
                    //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    @this.finalizarCompra(orderData); // Llamar al método Livewire
                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>
