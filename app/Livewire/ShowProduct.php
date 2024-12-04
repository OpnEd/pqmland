<?php

namespace App\Livewire;

use App\Models\Product;
use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Session;

class ShowProduct extends BaseComponent
{
    public Product $product;

    public $cantidad = 1;
    public $carrito = [];
    public $producto;
    public $productoId;
    public $productoNombre;
    public $mostrarModalExito = false;
    public $productoAgregado = null;

    public function increment()
    {
        $this->cantidad++;
    }

    public function decrement()
    {
        $this->cantidad--;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->carrito = Session::get('carrito', []);
    }

    public function agregarProducto($productoId, $cantidad = 1)
    {
        $producto = Product::findOrFail($productoId);

        $this->carrito[$productoId] = [
            'nombre' => $producto->name,
            'precio' => $producto->sell_price,
            'cantidad' => isset($this->carrito[$productoId])
                ? $this->carrito[$productoId]['cantidad'] + $cantidad
                : $cantidad,
        ];

        Session::put('carrito', $this->carrito);

        // Configura el modal de éxito
        $this->productoAgregado = $producto->name;
        $this->mostrarModalExito = true;

        $this->dispatch('carritoActualizado');
    }

    public function render()
    {
        return view('livewire.show-product')->layout($this->getLayout());
    }
}
