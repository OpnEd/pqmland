<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;

class ShowPost extends BaseComponent
{
    /* public Post $post;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
    } */

    /* public function mount(Post $post) // puede hacers así o de la forma anterior. Si se hace de esta forma puede omiritse el método mount(), desde luego conservando 'public Post $post;'
    {
        $this->post = $post;
    } */

    public function render()
    {
        return view('livewire.show-post')->layout($this->getLayout());
    }
}
