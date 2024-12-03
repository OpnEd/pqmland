<?php

namespace App\Livewire;

use App\Models\Product;
use App\Livewire\BaseComponent;

class ShowProduct extends BaseComponent
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.show-product')->layout($this->getLayout());
    }
}
