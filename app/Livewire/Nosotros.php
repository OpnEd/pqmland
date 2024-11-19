<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Nosotros')]
class Nosotros extends BaseComponent
{
    public function render()
    {
        return view('livewire.nosotros')->layout($this->getLayout());
    }
}
