<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    public $user;

    public $fields = [
        'last_name', 'degree', 'professional_profile', 'current_position', 'city',
        'phone_number', 'url', 'linked_in', 'facebook', 'tweeter', 'instagram', 'birth_date',
    ];

    public $cv_published; // Se usará sólo si el usuario es superusuario

    protected $rules = [
        'user.last_name' => 'nullable|string|max:255',
        'user.degree' => 'nullable|string|max:255',
        'user.professional_profile' => 'nullable|string',
        'user.current_position' => 'nullable|string|max:255',
        'user.city' => 'nullable|string|max:255',
        'user.phone_number' => 'nullable|string|max:20',
        'user.url' => 'nullable|url',
        'user.linked_in' => 'nullable|url',
        'user.facebook' => 'nullable|url',
        'user.tweeter' => 'nullable|url',
        'user.instagram' => 'nullable|url',
        'user.birth_date' => 'nullable|date',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->cv_published = $this->user->cv_published; // Si es superusuario, se habilita su gestión
    }

    public function updatedUser($field)
    {
        $this->validateOnly($field);
    }

    public function save()
    {
        $this->validate();

        // Generar automáticamente el slug
        $this->user->slug = Str::slug("{$this->user->name} {$this->user->last_name}");

        // Guardar cambios
        $this->user->save();

        session()->flash('success', '¡Perfil actualizado correctamente!');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
