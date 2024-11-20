<?php

namespace App\Livewire;

use App\Models\Blog as ModelsBlog;
use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Blog')]
class Blog extends  BaseComponent
{
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
