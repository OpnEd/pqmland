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
    public $productoNombre = ''; // Nombre del producto para mostrar en el modal

    public $mostrarModal = false; // Controla la visibilidad del modal

    public function mount()
    {
        $this->carrito = Session::get('carrito', []);
    }

    public function eliminarProducto($productoId)
    {
        unset($this->carrito[$productoId]);
        Session::put('carrito', $this->carrito);
        $this->dispatch('carritoActualizado');
    }

    public function render()
    {
        return view('livewire.carrito')->layout($this->getLayout());
    }
}
