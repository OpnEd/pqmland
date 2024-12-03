<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class ProductList extends BaseComponent
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    public function setSort ($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function products ()
    {
        return Product::orderBy('created_at', $this->sort)
            ->when(ProductCategory::where('slug', $this->category)->first(), function ($query) {
                $query->withCategory($this->category);
            })
            ->where('name', 'like', "%{$this->search}%")
            ->simplePaginate(6);
    }


    public function render()
    {
        return view('livewire.product-list')->layout($this->getLayout());
    }
}
