<?php

namespace App\Livewire;

use App\Models\Pedido;
use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Gracias')]
class PaginaAgradecimiento extends BaseComponent
{
    public $pedido;

    public function mount($pedido_id)
    {
        $this->pedido = Pedido::with('detalles.producto')->findOrFail($pedido_id);
    }

    public function render()
    {
        return view('livewire.pagina-agradecimiento', [
            'pedido' => $this->pedido,
        ])->layout($this->getLayout());
    }
}
