<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;

class Store extends BaseComponent
{
    public function render()
    {
        return view('livewire.store')->layout($this->getLayout());
    }
}
