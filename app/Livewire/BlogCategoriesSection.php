<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;

class BlogCategoriesSection extends Component
{
    public function render()
    {
        return view('livewire.blog-categories-section',[
            'blogCategories' => BlogCategory::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get(),
        ]);
    }
}
