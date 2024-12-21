<?php

namespace App\Livewire;

use App\Helpers\StatusMapper;
use App\Models\GuestPedido;
use App\Models\GuestDetallePedido;
use Illuminate\Support\Facades\DB;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Log;
use App\Models\Guest;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\Transaccion;

class CheckoutConfirm extends BaseComponent
{
    public $query = ''; // Texto ingresado por el usuario
    public $carrito = [];
    public $checkoutForm = [];

    public function mount()
    {
        $this->carrito = Session::get('carrito', []);
        $this->checkoutForm = session('checkoutForm');

        if (empty($this->checkoutForm)) {
            // Set default values or handle the absence of form data
            $this->checkoutForm = [
                'your_name' => '',
                'your_email' => '',
                'your_pnone' => '',
                'your_city' => '',
                'address' => '',
                'company_name' => null,
            ];
            session()->flash('warning', 'Aún no están tus datos en el formulario. No olvides diligenciarlos!.');
        }
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
                // Map PayPal status to your application's status
                $orderStatus = StatusMapper::mapPayPalStatus($orderData['status']);

                // 1. Guardar la información del cliente
                // Crear el objeto Guest con los datos de la sesión
                $guest = Guest::create([
                    'name' => $this->checkoutForm['your_name'], // Datos obtenidos de la sesión
                    'email' => $this->checkoutForm['your_email'],
                    'phone_number' => $this->checkoutForm['your_phone'],
                    'city' => $this->checkoutForm['your_city'],
                    'address' => $this->checkoutForm['address'],
                    'company_name' => $this->checkoutForm['company_name'] ?? null, // Campo opcional
                ]);

                // 2. Crear el pedido
                $pedido = GuestPedido::create([
                    'guest_id' => $guest->id,
                    'total' => $this->getTotalProperty(),
                    'estado' => 'En proceso', // Puedes ajustar según tus necesidades
                    'transaccion_id' => $orderData['id'], // ID de transacción de PayPal
                ]);

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
                }

                // 4. Guardar los datos de la transacción de PayPal
                Transaccion::create([
                    'guest_pedido_id' => $pedido->id,
                    'transaccion_id' => $orderData['id'],
                    'monto' => $orderData['purchase_units'][0]['amount']['value'],
                    'estado' => $orderStatus, // "COMPLETED" para pagos exitosos
                    'datos' => $orderData, // Guarda todo el objeto de transacción si es necesario
                ]);

                // Limpiar el carrito después del guardado exitoso
                Session::forget(['carrito', 'checkoutForm']);

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
                session()->flash('mensaje', 'Compra realizada con éxito.');
                // Redirigir a la página de agradecimiento
                return redirect(url()->route('gracias.guest', ['pedido_id' => $pedido->id]));
            });
        } catch (\Exception $e) {
            Log::error('Error al guardar el pedido: ' . $e->getMessage());
            session()->flash('error', 'Hubo un problema al procesar tu compra. Por favor,
            inténtalo de nuevo. No olvides dar click en el botón de guardar datos.');
        }
    }

    public function getSubtotalProperty()
    {
        return array_sum(array_column($this->carrito, 'subtotal'));
    }

    public function getTotalDescuentosProperty()
    {
        return array_sum(array_column($this->carrito, 'descuentos'));
    }

    public function getTotalImpuestosProperty()
    {
        return array_sum(array_column($this->carrito, 'impuestos'));
    }

    public function render()
    {
        return view('livewire.checkout-confirm')->layout($this->getLayout());
    }
}
