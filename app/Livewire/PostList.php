<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use App\Livewire\BaseComponent;
use App\Models\BlogCategory;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class PostList extends BaseComponent
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
    public function posts ()
    {
        return Blog::published()
            ->orderBy('created_at', $this->sort)
            ->when(BlogCategory::where('slug', $this->category)->first(), function ($query) {
                $query->withCategory($this->category);
            })
            ->where('title', 'like', "%{$this->search}%")
            ->withCount('favoritedByUsers')
            ->paginate(3);
    }

    public function render()
    {
        return view('livewire.post-list')->layout($this->getLayout());
    }
}
