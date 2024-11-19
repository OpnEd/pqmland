<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Bienvenidos')]
class Welcome extends BaseComponent
{
    public function render()
    {
        return view('livewire.welcome')->layout($this->getLayout());
    }
}
