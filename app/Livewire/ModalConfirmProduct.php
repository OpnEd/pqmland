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

    #[On('mostrarModalConfirmacion')]
    public function mostrarModalConfirmacion($productoId)
    {
        $this->productoId = $productoId;
        $this->producto = Product::findOrFail($productoId);
        $this->productoNombre = $this->producto->name;
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
        $producto = Product::findOrFail($productoId);

        $this->carrito[$productoId] = [
            'nombre' => $producto->name,
            'precio' => $producto->sell_price,
            'cantidad' => isset($this->carrito[$productoId])
                ? $this->carrito[$productoId]['cantidad'] + $cantidad
                : $cantidad,
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

    public function render()
    {
        return view('livewire.modal-confirm-product');
    }
}
