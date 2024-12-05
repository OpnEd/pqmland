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

    public function actualizarCantidad($productoId, $cantidad)
    {
        if ($cantidad <= 0) {
            unset($this->carrito[$productoId]); // Elimina el producto si la cantidad es 0 o negativa
        } else {
            // Actualiza la cantidad en el carrito
            $this->carrito[$productoId]['cantidad'] = $cantidad;
        }

        // Actualiza la sesión
        Session::put('carrito', $this->carrito);
    }

    public function eliminarProducto($productoId)
    {
        unset($this->carrito[$productoId]);
        Session::put('carrito', $this->carrito);
        $this->dispatch('carritoActualizado');
    }

    public function getTotalProperty()
    {
        // Calcula la suma de los precios totales de todos los productos
        return array_reduce($this->carrito, function ($total, $item) {
            return $total + ($item['precio'] * $item['cantidad']);
        }, 0);
    }

    public function render()
    {
        return view('livewire.carrito')->layout($this->getLayout());
    }
}
