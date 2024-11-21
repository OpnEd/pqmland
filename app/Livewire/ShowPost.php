<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use App\Models\Blog;

class ShowPost extends BaseComponent
{
    public Blog $post;

    public bool $canReadMore = false;

    public function mount(Blog $post)
    {
        $this->post = $post;
        $this->canReadMore = auth()->check(); // Permite seguir leyendo si el usuario está autenticado
    }

    public function render()
    {
        return view('livewire.show-post')->layout($this->getLayout());
    }
}
