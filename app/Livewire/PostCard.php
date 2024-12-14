<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class PostCard extends Component
{
    public $post; // ID del post seleccionado
    public $modalLogReadMore = false;

    public function mount(Blog $post)
    {
        $this->post = $post;
    }

    public function readMore()
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            $this->modalLogReadMore = true; // Mostrar el modal
        } else {
            return $this->redirect('/posts/' . $this->post->slug);
        }
    }

    public function cerrarModal()
    {
        $this->modalLogReadMore = false;
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
