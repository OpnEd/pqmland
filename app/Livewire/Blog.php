<?php

namespace App\Livewire;

use App\Models\Blog as ModelsBlog;
use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Blog')]
class Blog extends  BaseComponent
{
    public bool $canReadMore = false;
    public bool $modalLogueoLectura = false;
    public $lastPost;

    public function mount()
    {
        $this->canReadMore = auth()->check();
        $this->lastPost = ModelsBlog::published()->orderBy('created_at', 'desc')->first();
    }

    public function readMore()
    {
        if (!$this->canReadMore) {
            $this->modalLogueoLectura = true; // Mostrar el modal
            //return;
        } else {
            return $this->redirect('/posts/' . $this->lastPost->slug);
        }
    }

    public function closeModal()
    {
        $this->modalLogueoLectura = false; // Oculta el modal
    }

    public function render()
    {
        return view('livewire.blog', [
            'latestPosts' => ModelsBlog::published()
                ->latest('created_at')
                ->take(3)
                ->get(),
            'featuredPost' => ModelsBlog::published()
                ->featured()
                ->latest('created_at')
                ->take(3)
                ->get(),
        ])->layout($this->getLayout());
    }
}
