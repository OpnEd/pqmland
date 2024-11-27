<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageUpload extends Component
{
    public $name;
    public $imageUrl;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string|null $imageUrl
     */
    public function __construct($name, $imageUrl = null)
    {
        $this->name = $name;
        $this->imageUrl = $imageUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-upload');
    }
}
