<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;
use App\Models\User;

#[Title('PQM - Nosotros')]
class Nosotros extends BaseComponent
{
    public User $user;

    public $colaboradores;
    public $title = 'Quiénes Somos y Qué Hacemos';
    public $subtitle = 'La Misión y la Visión que nos guían';
    public $mision = '';
    public $vision = '';

    public function mount(User $user)
    {
        // Obtener todos los usuarios que son colaboradores
        $this->colaboradores = User::where('colaborator', true)->get();
        $this->user = $user->load(['education', 'workExperience', 'projects']);
    }

    public function render()
    {
        return view('livewire.nosotros', [
            'socialMediaLinks' => $this->user->social_media_links, //getSocialMediaLinksAttribute() accessor en User model
        ])->layout($this->getLayout());
    }
}
