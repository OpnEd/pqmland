<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ModalConfirmProduct extends Component
{
    public $carrito = [];
    public $producto;
    public $productoId;
    public $productoNombre;
    public $mostrarModal = false;

    public function mount()
    {
        $this->carrito = Session::get('carrito', []);
    }

    #[On('solicitar-logueo')]
    public function mostrarModalConfirmacion()
    {
        $this->mostrarModal = true;
    }

    public function agregarProductoConfirmado()
    {
        $this->agregarProducto($this->productoId);
        $this->cerrarModal();
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
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
        $this->dispatch('carritoActualizado');
    }

    public function eliminarProducto($productoId)
    {
        unset($this->carrito[$productoId]);
        Session::put('carrito', $this->carrito);
        $this->dispatch('carritoActualizado');
    }

    public function redirectToLogin()
    {
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.modal-confirm-product');
    }
}
