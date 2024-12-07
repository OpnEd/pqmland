<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteProducts extends Component
{
    public $productId; // ID del producto seleccionado
    public $isFavorited = false; // Estado de favorito
    public $showModal = false;

    public function mount(Product $product)
    {
        $this->productId = $product->id;
        //$this->isFavorited = Auth::user()->favoriteProducts->contains($product->id);
    }

    public function toggleFavorite()
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            $this->dispatch('solicitar-logueo-favoritos')->to(ModalConfirmProduct::class); // Mostrar el modal
            return;
        }

        // Obtener el usuario autenticado
        $user = auth()->user();


        if ($this->isFavorited) {
            // Eliminar de favoritos
            $user->favoriteProducts()->detach($this->productId);
            $this->isFavorited = false;
        } else {
            // Agregar a favoritos
            $user->favoriteProducts()->attach($this->productId);
            $this->isFavorited = true;
        }

        // Opción: puedes emitir un evento para notificar cambios globales
        $this->dispatch('favoritesUpdated');
    }

    public function redirectToLogin()
    {
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.favorite-products');
    }
}
