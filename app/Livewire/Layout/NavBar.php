<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

use function Livewire\Volt\{on};

class NavBar extends Component
{
    public $links;
    public $carrito = [];
    public $mostrarDropdown = false; // Controla el estado del dropdown
    /**
     * Create a new component instance.
     */
    public function mount()
    {
        $this->carrito = Session::get('carrito', []);

        // Cargar los enlaces desde la configuración (por ejemplo, config/navbar.php)
        $this->links = config('navbar');
    }

    public function eliminarProducto($productoId)
    {
        unset($this->carrito[$productoId]);
        Session::put('carrito', $this->carrito);
    }

    #[On('carritoActualizado')]
    public function actualizarCarrito()
    {
        $this->carrito = session('carrito', []);
    }

    public function render()
    {
        $totalProductos = count($this->carrito); // Productos únicos
        $totalUnidades = array_sum(array_column($this->carrito, 'cantidad')); // Total de unidades

        return view('livewire.layout.nav-bar', compact('totalProductos', 'totalUnidades'));
    }
}
