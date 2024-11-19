<?php

namespace App\Livewire;

use Livewire\Component;

class BaseComponent extends Component
{
    protected function getLayout()
    {
        return auth()->check() ? 'layouts.app' : 'layouts.landing';
    }

    public function render()
    {
        return view('livewire.base-component')->layout($this->getLayout());
    }
}
