<?php

namespace App\Livewire;

use App\Models\User;
use App\Livewire\BaseComponent;

class CurriculumVitae extends BaseComponent
{
    public User $user;

    public function mount(User $user)
    {
        // Carga al usuario con las relaciones necesarias
        $this->user = $user->load(['education', 'workExperience', 'projects']);
    }

    public function render()
    {
        return view('livewire.curriculum-vitae', [
            'socialMediaLinks' => $this->user->social_media_links,
        ])->layout($this->getLayout());
    }
}
