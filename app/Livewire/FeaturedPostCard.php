<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class FeaturedPostCard extends Component
{
    public $featuredPost; // ID del featuredPost seleccionado
    public $modalLogReadF = false;

    public function mount(Blog $featuredPost)
    {
        $this->featuredPost = $featuredPost;
    }

    public function readMoreF()
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            $this->modalLogReadF = true; // Mostrar el modal
        } else {
            return $this->redirect('/posts/' . $this->featuredPost->slug);
        }
    }

    public function cerrarModal()
    {
        $this->modalLogReadF = false;
    }
    public function render()
    {
        return view('livewire.featured-post-card');
    }
}
