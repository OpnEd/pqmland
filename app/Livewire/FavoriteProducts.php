<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class FavoriteProducts extends Component
{
    public $product; // ID del producto seleccionado
    public $showModal = false;

    public function mount(Product $product)
    {
        $this->product = $product->id;
    }

    public function toggleFavorite()
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            $this->showModal = true; // Mostrar el modal
            return;
        }

        // Obtener el usuario autenticado
        $user = auth()->user();


        if ($user->favoriteProducts()->where('product_id', $this->product)->exists()) {
            // Eliminar de favoritos
            $user->favoriteProducts()->detach($this->product);
            return response()->json(['status' => 'removed']);
        } else {
            // Agregar a favoritos
            $user->favoriteProducts()->attach($this->product);
            return response()->json(['status' => 'added']);
        }

        // Opción: puedes emitir un evento para notificar cambios globales
        $this->dispatch('favoritesUpdated');
    }

    public function cerrarModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.favorite-products');
    }
}
