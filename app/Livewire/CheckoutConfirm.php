<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;

class CheckoutConfirm extends BaseComponent
{
    public function render()
    {
        return view('livewire.checkout-confirm')->layout($this->getLayout());
    }
}
