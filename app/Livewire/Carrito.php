<?php

namespace App\Livewire;

use App\Models\Product;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

class Carrito extends BaseComponent
{
    public $carrito = [];
    public $productoId; // Producto seleccionado para agregar al carrito
    public $registOrNot = false;

    public function mount()
    {
        $this->carrito = Session::get('carrito', []);
    }

    public function actualizarCantidad($productoId, $cantidad)
    {
        if ($cantidad <= 0) {
            unset($this->carrito[$productoId]); // Elimina el producto si la cantidad es 0 o negativa
        } else {
            // Actualiza la cantidad en el carrito
            $this->carrito[$productoId]['cantidad'] = $cantidad;
            $producto = Product::with(['category:id,name', 'taxes:id,name,rate', 'discounts' => function ($query) {
                $query->where('is_active', true);
            }])->findOrFail($productoId);

            $basePrice = $producto->base_price;

            // Calcular descuentos
            $descuentoTotal = 0;

            $producto->discounts->whenNotEmpty(function ($discounts) use ($basePrice, &$descuentoTotal) {
                foreach ($discounts as $discount) {
                    $descuentoTotal += $discount->type === 'percentaje'
                        ? $basePrice * ($discount->value / 100)
                        : $discount->value;
                }
            });

            $precioConDescuento = max($basePrice - $descuentoTotal, 0);

            // Calcular impuestos exclusivos
            $impuestosTotales = 0;
            foreach ($producto->taxes as $tax) {
                $impuestosTotales += $tax->rate / 100 * $precioConDescuento;
            }

            // Precio final por unidad
            // $precioFinal = $precioConDescuento + $impuestosTotales;
            $precioFinal = $precioConDescuento;

            // Actualizar carrito
            $this->carrito[$productoId] = [
                'nombre' => $producto->name,
                'precio_unitario' => $precioFinal,
                'cantidad' => $this->carrito[$productoId]['cantidad'] ?? 0,
                'subtotal' => ($this->carrito[$productoId]['cantidad'] ?? 0) * $precioFinal,
                'categoria' => strtolower($producto->category->name ?? 'default'),
                'imagenes' => $producto->images[0] ?? null,
                'impuestos' => $impuestosTotales * $this->carrito[$productoId]['cantidad'] ?? 0,
                'descuentos' => $descuentoTotal * $this->carrito[$productoId]['cantidad'] ?? 0,
            ];
        }

        // Actualiza la sesión
        Session::put('carrito', $this->carrito);
        $this->dispatch('carritoActualizado');
    }

    public function eliminarProducto($productoId)
    {
        unset($this->carrito[$productoId]);
        Session::put('carrito', $this->carrito);
        $this->dispatch('carritoActualizado');
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

    public function checkOut()
{
    /* if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        $this->registOrNot = true;
    } */
    return redirect()->route('checkout');
}

    public function cerrarModal()
    {
        $this->registOrNot = false;
    }

    public function render()
    {
        return view('livewire.carrito')->layout($this->getLayout());
    }
}
