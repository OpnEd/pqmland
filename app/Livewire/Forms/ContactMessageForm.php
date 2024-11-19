<?php

namespace App\Livewire\Forms;

use App\Models\ContactMessage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactMessageForm extends Form
{
    #[Validate('required|string|min:5|max:255')]
    public $name = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|max:255')]
    public $subject = '';

    #[Validate('required|string|min:5')]
    public $message = '';

    public function store()
    {
        $this->validate();

        ContactMessage::create($this->all());

        $this->reset();
    }
}
