<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class GestCheckoutForm extends Component
{
    public $filteredCities = []; // Ciudades filtradas
    public $allCities = []; // Todas las ciudades disponibles

    // Campos del formulario
    public $form = [
        'your_name' => '',
        'your_email' => '',
        'your_phone' => '',
        'document_type' => '',
        'document_number' => '',
        'address' => '',
        'your_city' => '',
        'company_name' => '',
    ];

    // Reglas de validación
    protected $rules = [
        'form.your_name' => 'required|string|max:255',
        'form.your_email' => 'required|email|unique:guests,email|max:255',
        'form.your_phone' => 'required|string|max:15',
        'form.document_type' => 'required|string|max:15',
        'form.document_number' => 'required|string|max:15',
        'form.address' => 'required|string|max:255',
        'form.your_city' => 'required|string|min:3|max:100',
        'form.company_name' => 'nullable|string|max:255',
    ];

    // Mensajes de validación personalizados
    protected $messages = [
        'form.your_name.required' => 'El nombre es obligatorio.',
        'form.your_email.required' => 'El correo electrónico es obligatorio.',
        'form.your_email.email' => 'El correo electrónico debe ser una dirección válida.',
        'form.your_email.unique' => 'El correo electrónico ya está registrado.',
        'form.your_phone.required' => 'El número de teléfono es obligatorio.',
        'form.document_type' => 'Debes seleccionar un tipo de documento.',
        'form.document_number' => 'El número de documento es obligatorio.',
        'form.address.required' => 'La dirección es obligatoria.',
        'form.your_city.required' => 'La ciudad es obligatoria.',
    ];

    public function mount()
    {
        $sessionData = Session::get('checkoutForm', []);

        $this->form['your_name'] = $sessionData['your_name'] ?? '';
        $this->form['your_email'] = $sessionData['your_email'] ?? '';
        $this->form['your_phone'] = $sessionData['your_phone'] ?? '';
        $this->form['document_type'] = $sessionData['document_type'] ?? '';
        $this->form['document_number'] = $sessionData['document_number'] ?? '';
        $this->form['your_city'] = $sessionData['your_city'] ?? '';
        $this->form['address'] = $sessionData['address'] ?? '';
        $this->form['company_name'] = $sessionData['company_name'] ?? '';
        // Cargar el archivo JSON desde config
        $departments = config('colombia');

        if (is_array($departments)) {
            foreach ($departments as $department) {
                foreach ($department['ciudades'] as $city) {
                    $this->allCities[] = [
                        'department' => $department['departamento'],
                        'city' => $city
                    ];
                }
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

    // Validar campo específico al perder el foco
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        Session::put('checkoutForm', $this->form);

        // Si todos los campos están completos y válidos
        if ($this->isFormComplete()) {
            $this->dispatch('formularioCompleto');
            // Mostrar mensaje de éxito
            session()->flash('mensajeCompleto', 'Datos completos.');
        } else {
            $this->dispatch('formularioIncompleto');
            // Mostrar mensaje de éxito
            session()->flash('mensajeIncompleto', 'Datos incompletos.');
        }
    }

    public function isFormComplete()
    {
        foreach ($this->form as $campo) {
            if (empty($campo)) {
                return false;
            }
        }
        return true;
    }

    // Validar todos los datos y guardarlos en el carrito
    public function guardarDatos()
    {
        $validatedData = $this->validate();

        // Guardar los datos temporalmente en la sesión
        session()->put('checkoutForm', $validatedData['form']);

        // Emitir evento para notificar al otro componente que los datos están listos
        $this->dispatch('formularioCompleto');

        // Mostrar mensaje de éxito
        session()->flash('mensajeCompleto', 'Datos guardados correctamente.');
    }

    public function render()
    {
        return view('livewire.gest-checkout-form');
    }
}
