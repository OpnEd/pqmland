<?php

namespace App\View\Components\Landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component
{
    public $links;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Cargar los enlaces desde la configuración (por ejemplo, config/navbar.php)
        $this->links = config('navbar');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.nav-bar');
    }
}
