<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $fillable = [
        'guest_pedido_id',
        'transaccion_id',
        'monto',
        'estado',
        'datos',
    ];

    protected $casts = [
        'datos' => 'array',
    ];

    public function guestPedido()
    {
        return $this->belongsTo(GuestPedido::class, 'guest_pedido_id');
    }
}
