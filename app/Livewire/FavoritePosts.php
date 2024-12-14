<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

class FavoritePosts extends Component
{
    public $post; // ID del post seleccionado
    public $modalLogLikePost = false;

    public function mount(Blog $post)
    {
        $this->post = $post;
    }

    public function togglePFavorite()
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            $this->modalLogLikePost = true; // Mostrar el modal
            return;
        }

        // Obtener el usuario autenticado
        $user = auth()->user();

        $postId = $this->post->id;

        if ($user->favoritePosts()->where('blog_id', $postId)->exists()) {
            // Eliminar de favoritos
            $user->favoritePosts()->detach($postId);
            return response()->json(['status' => 'removed']);
        } else {
            // Agregar a favoritos
            $user->favoritePosts()->attach($postId);
            return response()->json(['status' => 'added']);
        }

        // Opción: puedes emitir un evento para notificar cambios globales
        $this->dispatch('favoritesPUpdated');
    }

    public function cerrarModal()
    {
        $this->modalLogLikePost = false;
    }

    public function render()
    {
        return view('livewire.favorite-posts');
    }
}
