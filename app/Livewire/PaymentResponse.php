<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;
use Illuminate\Http\Request;

class PaymentResponse extends BaseComponent
{
    public string $message;

    public function mount(Request $request)
    {
        // Captura el estado de la transacción desde el request
        $state = $request->input('transactionState');

        // Asigna un mensaje según el estado de la transacción
        $this->message = match ($state) {
            4 => 'Transacción aprobada',
            6 => 'Transacción rechazada',
            104 => 'Error de procesamiento',
            default => 'Estado desconocido',
        };
    }

    public function render()
    {
        return view('livewire.payment-response')->layout($this->getLayout());
    }
}
