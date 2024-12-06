<?php

namespace App\View\Components\Landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class NavBar extends Component
{
    public $links;
    public $carrito = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.nav-bar');
    }
}
