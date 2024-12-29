<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function guestPedido(): BelongsTo
    {
        return $this->belongsTo(GuestPedido::class, 'guest_pedido_id');
    }
}
