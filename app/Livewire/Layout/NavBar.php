<?php

namespace App\Livewire\Layout;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

use function Livewire\Volt\{on};

class NavBar extends Component
{
    public $links;
    public $carrito = [];
    public $mostrarDropdown = false; // Controla el estado del dropdown

    #[Url()]
    public $category = '';

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

    #[Computed()]
    public function products ()
    {
        return Product::orderBy('created_at', $this->sort)
            ->when(ProductCategory::where('slug', $this->category)->first(), function ($query) {
                $query->withCategory($this->category);
            })
            ->where('name', 'like', "%{$this->search}%")
            ->simplePaginate(6);
    }

    public function render()
    {
        $totalProductos = count($this->carrito); // Productos únicos
        $totalUnidades = array_sum(array_column($this->carrito, 'cantidad')); // Total de unidades

        return view('livewire.layout.nav-bar', compact('totalProductos', 'totalUnidades'));
    }
}
