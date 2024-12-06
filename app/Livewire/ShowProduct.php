<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
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
    public $modalExito = false;
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
        $producto = Product::select('name', 'sell_price', 'tax', 'images', 'product_category_id')
            ->with('category:id,name') // Traer nombre de la categoría
            ->findOrFail($productoId)->toArray();

        $this->carrito[$productoId] = [
            'nombre' => $producto['name'],
            'precio' => $producto['sell_price'],
            'tax' => $producto['tax'],
            'cantidad' => isset($this->carrito[$productoId])
                ? $this->carrito[$productoId]['cantidad'] + $cantidad
                : $cantidad,
            'categoria' => strtolower($producto['category']['name']) ?? 'default',
            'imagenes' => $producto['images'][0],
        ];

        Session::put('carrito', $this->carrito);

        // Configura el modal de éxito
        $this->productoAgregado = $producto['name'];
        $this->modalExito = true;

        $this->dispatch('carritoActualizado');
    }

    public function render()
    {
        return view('livewire.show-product')->layout($this->getLayout());
    }
}
