<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactMessageForm;
use App\Models\ContactMessage;
use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;

#[Title('PQM - Contáctanos')]
class Contacto extends BaseComponent
{
    public ContactMessageForm $form;

    public function save()
    {
        $this->form->store();

        /* return redirect('tienda')->with('status', 'Mensaje enviado! Mientras te contactamos, te gustaría echar un ojo a nuestra tienda?'); */
        $this->dispatch('message-sent', [
            'message' => 'Mientras te contactamos, podrías echar un ojo a nuestra tienda, o a nuestro blog...'
        ]);

    }

    public function render()
    {
        return view('livewire.contacto')->layout($this->getLayout());
    }
}
