<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use App\Livewire\BaseComponent;
use Livewire\WithPagination;

class PostList extends BaseComponent
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    public function setSort ($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[Computed()]
    public function posts ()
    {
        return Blog::published()->orderBy('created_at', $this->sort)->paginate(3);
    }

    public function render()
    {
        return view('livewire.post-list')->layout($this->getLayout());
    }
}
