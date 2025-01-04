<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use App\Models\Blog;
use Parsedown;

class ShowPost extends BaseComponent
{
    public Blog $post; // ID del post a editar
    public $title;
    public $video;
    public $cover;
    public $ilustrations = [];
    public $tags = [];
    public $abstract;
    public $introduction;
    public $objectives = [];
    public $content;
    public $conclusions = [];
    public $references = [];

    public function mount(Blog $post)
    {
        // Cargar el post desde la base de datos
        $post = Blog::findOrFail($post->id);

        // Asignar los valores a las variables del componente
        //$this->postId = $post->id;
        $this->title = $post->title;
        $this->video = $post->video;
        $this->cover = $post->cover;
        $this->ilustrations = $post->ilustrations ?? [];
        $this->tags = $post->tags ?? [];
        $this->abstract = $post->abstract;
        $this->introduction = $post->introduction;
        $this->objectives = $post->objectives ?? [];
        $this->content = $post->content;
        $this->conclusions = $post->conclusions ?? [];
        $this->references = $post->references ?? [];
    }

    public function render()
    {
        return view('livewire.show-post')->layout($this->getLayout());
    }
}
