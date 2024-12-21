<?php

namespace App\Livewire;

use App\Helpers\StatusMapper;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Transaccion;
use App\Models\User;
use App\Models\UserTransaccion;

class Dashboard extends Component
{
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
                'your_lastname' => '',
                'your_email' => '',
                'your_pnone' => '',
                'your_city' => '',
                'address' => '',
                'company_name' => null,
            ];
            session()->flash('warning', 'Aún no están tus datos en el formulario. No olvides diligenciarlos!.');
        }
    }

    public function finalizarCompra($orderData)
{
    //DB::beginTransaction(); // Inicia una transacción para garantizar la integridad

    try {
        DB::transaction(function () use ($orderData) {
        // Map PayPal status to your application's status
        $orderStatus = StatusMapper::mapPayPalStatus($orderData['status']);

        // 1. Guardar la información del usuario
        // Actualizar el objeto User con los datos de la sesión
        $user = \Illuminate\Support\Facades\Auth::user(); // Obtén el usuario autenticado

        // Actualiza los datos del usuario con los datos del formulario
        $user->update([
            'name' => $user->name ?? $this->checkoutForm['your_name'], // Solo actualizar si no está definido
            'email' => $user->email ?? $this->checkoutForm['your_email'],
            'phone_number' => $user->phone_number ?? $this->checkoutForm['your_phone'],
            'city' => $user->city ?? $this->checkoutForm['your_city'],
            'address' => $user->address ?? $this->checkoutForm['address'],
            'company_name' => $user->company_name ?? $this->checkoutForm['company_name'] ?? null, // Campo opcional
        ]);

        // 2. Crear el pedido
        $pedido = Pedido::create([
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id, // Obtén el ID del usuario autenticado
            'total' => $this->getTotalProperty(),
            'estado' => 'En proceso', // Puedes ajustar según tus necesidades
            'transaccion_id' => $orderData['id'], // ID de transacción de PayPal
        ]);

        //dd($pedido->id);

        // 3. Guardar los detalles del pedido
        foreach ($this->carrito as $item) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'product_id' => $item['producto_id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio_unitario'],
                'subtotal' => $item['subtotal'],
                'impuestos' => $item['impuestos'],
                'descuentos' => $item['descuentos'],
            ]);
        }

        // 4. Guardar los datos de la transacción de PayPal
        UserTransaccion::create([
            'pedido_id' => $pedido->id,
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
            'your_lastname' => '',
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
        return redirect(url()->route('gracias.usuario', ['pedido_id' => $pedido->id]));

    });
    } catch (\Exception $e) {
        Log::error('Error al guardar el pedido: ' . $e->getMessage());
        session()->flash('error', 'Hubo un problema al procesar tu compra. Por favor, inténtalo de nuevo.');
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

    public function render()
    {
        return view('livewire.dashboard');
    }
}
