<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use App\Models\Blog;

class ShowPost extends BaseComponent
{
    public Blog $post;
    public bool $canReadMore = false;
    public bool $mostrarModalLogueoLectura = false;

    public function mount(Blog $post)
    {
        $this->post = $post;
        $this->canReadMore = auth()->check();
    }

    public function readMore()
    {
        if (!$this->canReadMore) {
            $this->dispatch('solicitar-logueo-lectura')->to(ModalLogueoLectura::class); // Mostrar el modal
            return;
        }
    }

    public function render()
    {
        return view('livewire.show-post')->layout($this->getLayout());
    }
}
