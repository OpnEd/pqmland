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

/*
// Consulta básica con eloquent
$latestPost = Blog::orderBy('created_at', 'desc')->first();

// Consulta con filtros adicionales
$latestPost = Blog::where('status', 'published') // Solo posts publicados
    ->orderBy('created_at', 'desc')
    ->first();

// Uso de 'scope'
// En el modelo Blog
public function scopeLatestPost($query)
{
    return $query->orderBy('created_at', 'desc')->first();
}
// Luego en el controlador o en otro lugar
$latestPost = Blog::latestPost();

// El post más reciente de un usuario específico
$user = User::find($userId);
$latestPost = $user->posts()->orderBy('created_at', 'desc')->first();




*/
