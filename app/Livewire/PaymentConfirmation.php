<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Guest;
use App\Models\GuestPedido;
use App\Models\GuestDetallePedido;
use App\Models\Transaccion;
use App\Mail\OrderConfirmed;

class PaymentConfirmation extends Component
{
    public $orderData;
    public $carrito = [];
    public $checkoutForm = [];

    public function mount()
    {
        // Recuperar los datos enviados por PayU a través de POST
        $this->orderData = request()->all();
        $this->carrito = Session::get('carrito', []);
        $this->checkoutForm = session('checkoutForm');
        //$this->finalizarCompra($this->orderData);
        // Validar la firma (opcional pero recomendado)
        if ($this->validarFirma($this->orderData)) {
            // Llamar al método para procesar el pedido
            $this->finalizarCompra($this->orderData);
        } else {
            // Registro del error en logs si la firma no es válida
            \Log::error('Firma no válida en notificación PayU', $this->orderData);
        }
        // Retorna una respuesta JSON (se requiere Livewire v3 para respuestas HTTP en mount)
        // return response()->json(['message' => 'Confirmación recibida']);
    }

    public function getTotalProperty()
    {
        // Inicializa los totales
        $subtotal = 0;
        $totalDescuentos = 0;
        $totalImpuestos = 0;

        // Itera sobre los productos en el carrito
        foreach ($this->carrito as $item) {
            $subtotal += $item['subtotal']; // Suma el subtotal de cada producto
            $totalDescuentos += $item['descuentos']; // Suma los descuentos totales
            $totalImpuestos += $item['impuestos']; // Suma los impuestos totales
        }

        // Calcula el total final
        $total = $subtotal + $totalImpuestos - $totalDescuentos;

        // Asegura que el total no sea negativo
        return max(0, $total);
    }

    public function finalizarCompra($orderData)
    {
        try {
            DB::transaction(function () use ($orderData) {
                \Log::info('Iniciando transacción.');

                // 1. Validar la respuesta de PayU
                /* if ($orderData['response_code_pol'] != 4) {
                    throw new \Exception('La transacción no fue exitosa.');
                } */

                // 2. Guardar la información del cliente
                $guest = Guest::create([
                    'name' => $this->checkoutForm['your_name'], // Datos obtenidos de la sesión
                    'email' => $this->checkoutForm['your_email'],
                    'phone_number' => $this->checkoutForm['your_phone'],
                    'document_type' => $this->checkoutForm['document_type'],
                    'document' => $this->checkoutForm['document_number'],
                    'city' => $this->checkoutForm['your_city'],
                    'address' => $this->checkoutForm['address'],
                    'company_name' => $this->checkoutForm['company_name'] ?? null, // Campo opcional
                ]);
                \Log::info('Cliente creado:', $guest->toArray());

                // 2. Crear el pedido
                $pedido = GuestPedido::create([
                    'guest_id' => $guest->id,
                    'total' => $this->getTotalProperty(),
                    'estado' => 'En proceso', // Puedes ajustar según tus necesidades
                ]);
                \Log::info('Pedido creado:', $pedido->toArray());

                // 3. Guardar los detalles del pedido
                foreach ($this->carrito as $item) {
                    GuestDetallePedido::create([
                        'guest_pedido_id' => $pedido->id,
                        'product_id' => $item['producto_id'],
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'],
                        'subtotal' => $item['subtotal'],
                        'impuestos' => $item['impuestos'],
                        'descuentos' => $item['descuentos'],
                    ]);
                    \Log::info('Detalle creado:', $detalle->toArray());
                }

                // 4. Guardar los datos de la transacción de PayPal
                Transaccion::create([
                    'guest_pedido_id' => $pedido->id,
                    'transaccion_id' => $orderData['transaction_id'],
                    'monto' => $orderData['value'],
                    'estado' => $orderData['response_message_pol'], // "COMPLETED" para pagos exitosos
                    'datos' => $orderData, // Guarda todo el objeto de transacción si es necesario
                ]);
                \Log::info('Transacción guardada.');

                Mail::to($this->email)->send(new OrderConfirmed($guest->id, $pedido->id));

                // Limpiar el carrito después del guardado exitoso
                Session::forget(['carrito', 'checkoutForm']);
                \Log::info('Carrito limpiado.');

                // Limpiar el carrito y el formulario de checkout después del guardado exitoso
                $this->carrito = [];
                $this->checkoutForm = [
                    'your_name' => '',
                    'your_email' => '',
                    'your_phone' => '',
                    'your_city' => '',
                    'address' => '',
                    'company_name' => null,
                ];
                session(
                    [
                        'orderStatus' => $orderData['status'],
                        'mensaje' => 'Compra realizada con éxito!',
                    ],
                );
                /* session()->flash('mensaje', 'Compra realizada con éxito.'); */
            });
        } catch (\Exception $e) {
            Log::error('Error al guardar el pedido: ' . $e->getMessage());
            session()->flash('error', 'Hubo un problema al procesar tu compra. Por favor,
            inténtalo de nuevo. No olvides dar click en el botón de guardar datos.');
        }
    }

    private function validarFirma($data)
    {
        $apiKey = env('PAYU_API_KEY'); // Tu API Key de PayU
        $merchantId = $data['merchant_id'];
        $referenceSale = $data['reference_sale'];
        $value = number_format($data['value'] ?? 0, 2, '.', ''); // Formato numérico con 2 decimales
        if (substr($value, -1) == '0') {
            $value = number_format($data['value'] ?? 0, 1, '.', ''); // Formato numérico con 1 decimal si el segundo decimal es cero
        }
        $currency = $data['currency'];
        $statePol = $data['state_pol'];

        // Construcción de la cadena de firma
        $firma_cadena = "$apiKey~$merchantId~$referenceSale~$value~$currency~$statePol";
        $firma_calculada = md5($firma_cadena);

        $sign = $data['sign'];

        return $firma_calculada === $sign;
    }
}
