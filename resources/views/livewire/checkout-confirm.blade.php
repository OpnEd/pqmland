<section class="bg-white py-8 mx-8 antialiased dark:bg-gray-900 md:py-16 md:px-16">
    {{-- <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0"> --}}
    <ol
        class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
        <li
            class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
            <span
                class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Carrito
            </span>
        </li>

        <li
            class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
            <span
                class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Verificación
            </span>
        </li>

        <li class="flex shrink-0 items-center">
            <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Resumen de la órden
        </li>
    </ol>

    <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
        <div class="min-w-0 flex-1 space-y-8">
            <!-- filepath: /home/richard/laravel/pqmland/resources/views/checkout.blade.php -->
            @if (session('warning'))
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                    <p class="font-bold">Ojo!</p>
                    <p>{{ session('warning') }}</p>
                </div>
            @endif

            <!-- Rest of your checkout view -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Detalles para la entrega</h2>
                <livewire:gest-checkout-form />
            </div>
        </div>

        <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
            <div class="flow-root">
                <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
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

            <div class="space-y-3">

                {{-- <button type="submit"
                        class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceder
                        a Pagar</button> --}}

                {{-- <p class="text-sm font-normal text-gray-500 dark:text-gray-400">One or more items in your cart
                        require an account. <a href="#" title=""
                            class="font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">Sign
                            in or create an account now.</a>.</p> --}}
            </div>
        </div>
    </div>
    {{-- </form> --}}
</section>
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

{{-- //alert('Pago exitoso!')
// Full available details
//console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
//actions.redirect('http://127.0.0.1:8000/gracias');
//var paypalForm = document.getElementById('paypal-form');
//var detailInput = document.getElementById('details-input');
//var jsonDetail = JSON.stringify(orderData);
//detailInput.value = jsonDetail;
//paypalForm.submit(); --}}
