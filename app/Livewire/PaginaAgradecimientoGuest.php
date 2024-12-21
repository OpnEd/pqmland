<?php

namespace App\Livewire;

use App\Models\GuestPedido;
use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Gracias')]
class PaginaAgradecimientoGuest extends BaseComponent
{
    public $guest_pedido;

    public function mount($guest_pedido_id)
    {
        $this->guest_pedido = GuestPedido::with('guestDetalles.producto')->findOrFail($guest_pedido_id);
    }

    public function render()
    {
        return view('livewire.pagina-agradecimiento-guest', [
            'guest_pedido' => $this->guest_pedido,
        ])->layout($this->getLayout());
    }
}
