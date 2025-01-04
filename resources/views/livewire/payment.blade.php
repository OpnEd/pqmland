<section class="bg-white py-8 mx-8 antialiased dark:bg-gray-900 md:py-16 md:px-16">
    {{-- {{dd($buyerFullName)}} --}}
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <ol
            class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
            <li
                class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                <span
                    class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
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
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
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

                    <!-- Mensaje de error -->
                    @if (session()->has('mensaje'))
                        <div
                            class="mt-4 w-full rounded-lg bg-green-100 p-4 text-sm font-thin text-center text-green-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    <livewire:gest-checkout-form />
                </div>
                {{-- <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="credit-card" aria-describedby="credit-card-text" type="radio"
                                        name="payment-method" value=""
                                        class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                        checked />
                                </div>

                                <div class="ms-4 text-sm">
                                    <label for="credit-card"
                                        class="font-medium leading-none text-gray-900 dark:text-white">
                                        Credit
                                        Card </label>
                                    <p id="credit-card-text"
                                        class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                                        Pay
                                        with your credit card</p>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center gap-2">
                                <button type="button"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                <button type="button"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                            </div>
                        </div>

                        <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio"
                                        name="payment-method" value=""
                                        class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                </div>

                                <div class="ms-4 text-sm">
                                    <label for="pay-on-delivery"
                                        class="font-medium leading-none text-gray-900 dark:text-white">
                                        Payment on delivery </label>
                                    <p id="pay-on-delivery-text"
                                        class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">+$15 payment
                                        processing
                                        fee</p>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center gap-2">
                                <button type="button"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                <button type="button"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                            </div>
                        </div>

                        <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="paypal-2" aria-describedby="paypal-text" type="radio"
                                        name="payment-method" value=""
                                        class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                </div>

                                <div class="ms-4 text-sm">
                                    <label for="paypal-2"
                                        class="font-medium leading-none text-gray-900 dark:text-white">
                                        Paypal
                                        account </label>
                                    <p id="paypal-text"
                                        class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                                        Connect
                                        to your account</p>
                                </div>
                            </div>

                            <div class="mt-4 flex items-center gap-2">
                                <button type="button"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                <button type="button"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                    {{-- <div id="paypal-button-container"></div> --}}
                    {{-- <a href="https://biz.payulatam.com/B0f8a9a99F6D5B7"><img src="https://ecommerce.payulatam.com/img-secure-2015/boton_pagar_mediano.png"></a> --}}
                    <form id="payu-form" method="post"
                        action="{{ config('app.env') === 'prod' ? 'https://checkout.payulatam.com/ppp-web-gateway-payu/' : 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/' }}">

                        <input name="merchantId" type="hidden" value="{{ $merchantId }}">

                        <input name="accountId" type="hidden" value="{{ $accountId }}">

                        <input name="description" type="hidden" value="{{ $description }}">

                        <input name="referenceCode" type="hidden" value="{{ $referenceCode }}">

                        <input name="amount" type="hidden" value="{{ $amount }}">

                        <input name="tax" type="hidden" value="{{ $tax }}">

                        <input name="taxReturnBase" type="hidden" value="{{ $taxReturnBase }}">

                        <input name="currency" type="hidden" value="{{ $currency }}">

                        <input name="signature" type="hidden" value="{{ $signature }}">

                        <input name="test" type="hidden" value="{{ $test }}">

                        <input name="buyerEmail" type="hidden" value="{{ $buyerEmail }}">

                        <input name="telephone" type="hidden" value="{{ $telephone }}">

                        <input name="buyerFullName" type="hidden" value="{{ $buyerFullName }}">

                        <input name="payerEmail" type="hidden" value="{{ $payerEmail }}">

                        <input name="payerPhone" type="hidden" value="{{ $payerPhone }}">

                        <input name="payerFullName" type="hidden" value="{{ $payerFullName }}">

                        <input name="payerDocument" type="hidden" value="{{ $payerDocument }}">

                        <input name="payerDocumentType" type="hidden" value="{{ $payerDocumentType }}">

                        <input name="shippingAddress" type="hidden" value="{{ $shippingAddress }}">

                        <input name="shippingCity" type="hidden" value="{{ $shippingCity }}">

                        <input name="responseUrl" type="hidden" value="https://www.pqm-pharmaquality.com.co/compra-realizada">

                        <input name="confirmationUrl" type="hidden" value="https://www.pqm-pharmaquality.com.co/payment/confirmation">

                        <!-- Botón de pago -->
                        <button type="submit" class="w-full" {{ !$botonHabilitado ? 'disabled hidden' : '' }}>
                            <img src="https://prod-developers.s3.amazonaws.com/latam/images/VerdeClaro/Medios_Pago_Verde_Claro_468x60.jpg"
                                title="PayU - Medios de pago" alt="PayU - Medios de pago" width="468"
                                height="60" />
                        </button>

                    </form>

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
    </div>
</section>

<script>
    // Escucha el evento emitido por Livewire para redirigir al usuario
    document.addEventListener('DOMContentLoaded', function() {
        Livewire.on('redirectToPayU', () => {
            document.getElementById('payu-form').submit();
        });
    });
</script>

{{-- <script>
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
</script> --}}

{{-- //alert('Pago exitoso!')
// Full available details
//console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
//actions.redirect('http://127.0.0.1:8000/gracias');
//var paypalForm = document.getElementById('paypal-form');
//var detailInput = document.getElementById('details-input');
//var jsonDetail = JSON.stringify(orderData);
//detailInput.value = jsonDetail;
//paypalForm.submit(); --}}
