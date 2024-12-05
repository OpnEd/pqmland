<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('PQM - Tienda')]
class Store extends BaseComponent
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
            ->paginate(6);
    }


    public function render()
    {
        return view('livewire.store', [
            'featuredProducts' => Product::with('category')->featured()
                ->latest('created_at')
                ->take(9)
                ->get(),
        ])->layout($this->getLayout());
    }
    /* public function render()
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
    } */
}
