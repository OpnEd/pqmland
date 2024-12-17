<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Session;

class CheckoutConfirm extends BaseComponent
{
    public $query = ''; // Texto ingresado por el usuario
    public $filteredCities = []; // Ciudades filtradas
    public $allCities = []; // Todas las ciudades disponibles
    public $carrito = [];

    public function mount()
    {
        $this->carrito = Session::get('carrito', []);
        // Cargar el archivo JSON desde config
        $departments = config('colombia');

        if (is_array($departments)) {
            foreach ($departments as $department) {
                $this->allCities = array_merge($this->allCities, $department['ciudades']);
            }
        } else {
            // Manejo de error
            $this->allCities = [];
        }

        // Inicialmente mostrar todas las ciudades
        $this->filteredCities = $this->allCities;
    }

    public function updatedQuery()
    {
        // Filtrar ciudades al escribir
        $this->filteredCities = array_filter($this->allCities, function ($city) {
            return stripos($city, $this->query) !== false;
        });
    }

    public function getTotalProperty()
    {
        // Inicializa los totales
        $subtotal = 0;
        $totalDescuentos = 0;
        $totalImpuestos = 0;

        // Itera sobre los productos en el carrito
        foreach ($this->carrito as $item) {
            $subtotal += $item['subtotal']; // Suma el subtotal de cada producto
            $totalDescuentos += $item['descuentos']; // Suma los descuentos totales
            $totalImpuestos += $item['impuestos']; // Suma los impuestos totales
        }

        // Calcula el total final
        $total = $subtotal + $totalImpuestos - $totalDescuentos;

        // Asegura que el total no sea negativo
        return max(0, $total);
    }

    public function getSubtotalProperty()
    {
        return array_sum(array_column($this->carrito, 'subtotal'));
    }

    public function getTotalDescuentosProperty()
    {
        return array_sum(array_column($this->carrito, 'descuentos'));
    }

    public function getTotalImpuestosProperty()
    {
        return array_sum(array_column($this->carrito, 'impuestos'));
    }

    public function render()
    {
        return view('livewire.checkout-confirm')->layout($this->getLayout());
    }
}
