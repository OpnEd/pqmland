<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class GestCheckoutForm extends Component
{
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

    // Campos del formulario
    public $form = [
        'your_name' => '',
        'your_email' => '',
        'your_phone' => '',
        'address' => '',
        'your_city' => '',
        'company_name' => '',
    ];

    // Reglas de validación
    protected $rules = [
        'form.your_name' => 'required|string|max:255',
        'form.your_email' => 'required|email|unique:guests,email|max:255',
        'form.your_phone' => 'required|string|max:15',
        'form.address' => 'required|string|max:255',
        'form.your_city' => 'required|string|max:100',
        'form.company_name' => 'nullable|string|max:255',
    ];

    // Mensajes de validación personalizados
    protected $messages = [
        'form.your_name.required' => 'El nombre es obligatorio.',
        'form.your_email.required' => 'El correo electrónico es obligatorio.',
        'form.your_email.email' => 'El correo electrónico debe ser una dirección válida.',
        'form.your_email.unique' => 'El correo electrónico ya está registrado.',
        'form.your_phone.required' => 'El número de teléfono es obligatorio.',
        'form.your_phone.required' => 'El número de teléfono debes ser de esta forma 888-888-8888.',
        'form.address.required' => 'La dirección es obligatoria.',
        'form.your_city.required' => 'La ciudad es obligatoria.',
    ];

    public function updatedQuery()
    {
        // Filtrar ciudades al escribir
        $this->filteredCities = array_filter($this->allCities, function ($city) {
            return stripos($city, $this->query) !== false;
        });
    }

    // Validar campo específico al perder el foco
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        Session::put('checkoutForm', $this->form);
    }

    // Validar todos los datos y guardarlos en el carrito
    public function guardarDatos()
    {
        $validatedData = $this->validate();

        // Guardar los datos temporalmente en la sesión
        session()->put('checkoutForm', $validatedData['form']);

        // Mostrar mensaje de éxito
        session()->flash('mensaje', 'Datos guardados correctamente.');
    }

    public function render()
    {
        return view('livewire.gest-checkout-form');
    }
}
