<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;

class CheckoutConfirm extends BaseComponent
{
    public $query = ''; // Texto ingresado por el usuario
    public $filteredCities = []; // Ciudades filtradas
    public $allCities = []; // Todas las ciudades disponibles

    public function mount()
    {
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

    public function render()
    {
        return view('livewire.checkout-confirm')->layout($this->getLayout());
    }
}
