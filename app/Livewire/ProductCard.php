<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public Product $product;
    public $inclusiveTaxes;
    public $priceWithInclusiveTaxes;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->inclusiveTaxes = $product->taxes->where('is_inclusive', true);
    }

    public function viewPrice()
    {
        $this->priceWithInclusiveTaxes = $this->product->base_price;

        if ($this->inclusiveTaxes->isEmpty()) {
            return $this->priceWithInclusiveTaxes; // Si no hay impuestos, devuelve el precio base
        }

        foreach ($this->inclusiveTaxes as $tax) {
            $this->priceWithInclusiveTaxes += $this->priceWithInclusiveTaxes * $tax->rate / 100;
        }

        return $this->priceWithInclusiveTaxes;
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
