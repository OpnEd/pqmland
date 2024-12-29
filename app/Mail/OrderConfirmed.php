<?php

namespace App\Mail;

use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\GuestPedido;

class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The name of the recipient.
     *
     * @var string
     */
    public $pedido;
    public $guest;

    /**
     * Create a new message instance.
     *
     * @param string $pedido
     */
    public function __construct(int $guest_id, int $pedido_id)
    {
        $this->pedido = GuestPedido::with('guestDetalles.producto')->findOrFail($pedido_id);
        $this->guest = Guest::findOrFail($guest_id);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('rialmon@gmail.com', 'Test Sender'),
            subject: 'Orden Confirmada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.confirmed-order',
            with: ['pedido' => $this->pedido, 'guest' => $this->guest],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
