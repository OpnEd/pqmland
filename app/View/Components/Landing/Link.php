<?php

namespace App\View\Components\Landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Link extends Component
{
    public $ruta;
    public $activo;
    public $texto;
    public $clase;
    public $target;

    /**
     * Crear una nueva instancia del componente.
     *
     * @param string $ruta
     * @param string|null $texto
     * @param string|null $clase
     * @param string|null $target
     */
    public function __construct($ruta, $texto = null, $clase = null, $target = '_self')
    {
        $this->ruta = $ruta;
        $this->texto = $texto ?? 'Enlace';  // Texto por defecto si no se proporciona
        $this->clase = $clase;
        $this->target = $target;

        // Definir si el enlace es 'activo' basándose en la ruta actual
        $this->activo = Route::currentRouteName() === $ruta;
    }

    /**
     * Renderizar el componente.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.link');
    }
}
