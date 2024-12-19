<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Session;

class ShowProduct extends BaseComponent
{
    // public Product $product;

    public $cantidad = 1;
    public $carrito = [];
    public $product;
    public $modalExito = false;
    public $productoAgregado = null;
    public $inclusiveTaxes;
    public $priceWithInclusiveTaxes;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->carrito = Session::get('carrito', []);
        $this->inclusiveTaxes = $product->taxes->where('is_inclusive', true);
    }

    public function increment()
    {
        $this->cantidad++;
    }

    public function decrement()
    {
        if ($this->cantidad > 1) {
            $this->cantidad--;
        }
    }

    public function viewPrice()
    {
        $this->priceWithInclusiveTaxes = $this->product->base_price;

        if ($this->inclusiveTaxes->isEmpty()) {
            return $this->priceWithInclusiveTaxes; // Si no hay impuestos, devuelve el precio base
        }

        foreach ($this->inclusiveTaxes as $tax) {
            $this->priceWithInclusiveTaxes += $this->priceWithInclusiveTaxes * $tax->rate / 100;
        }

        return $this->priceWithInclusiveTaxes;
    }

    public function agregarProducto($productoId, $cantidad = 1)
    {
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
        $precioFinal = $precioConDescuento + $impuestosTotales;

        // Actualizar carrito
        $this->carrito[$productoId] = [
            'producto_id' => $productoId,
            'nombre' => $producto->name,
            'precio_unitario' => $precioFinal,
            'cantidad' => ($this->carrito[$productoId]['cantidad'] ?? 0) + $cantidad,
            'subtotal' => (($this->carrito[$productoId]['cantidad'] ?? 0) + $cantidad) * $precioFinal,
            'categoria' => strtolower($producto->category->name ?? 'default'),
            'imagenes' => $producto->images[0] ?? null,
            'impuestos' => $impuestosTotales * (($this->carrito[$productoId]['cantidad'] ?? 0) + $cantidad),
            'descuentos' => $descuentoTotal * (($this->carrito[$productoId]['cantidad'] ?? 0) + $cantidad),
        ];
        /* dd($this->carrito[$productoId]); */
        Session::put('carrito', $this->carrito);

        // Configura el modal de éxito
        $this->productoAgregado = $producto->name;
        $this->modalExito = true;

        $this->dispatch('carritoActualizado');
    }

    public function render()
    {
        return view('livewire.show-product', [
            'discountsActivos' => $this->product->discounts->where('is_active', true),
        ])->layout($this->getLayout());
    }
}
