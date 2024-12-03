<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('PQM - Tienda')]
class Store extends BaseComponent
{
    public function render()
    {
        return view('livewire.store', [
            'latestProducts' => Product::with('category')
                ->where('featured', false)
                ->latest('created_at')
                ->take(6)
                ->get(),
            'featuredProducts' => Product::with('category')->featured()
                ->latest('created_at')
                ->take(9)
                ->get(),
        ])->layout($this->getLayout());
    }
}
