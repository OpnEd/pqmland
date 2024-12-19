<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GuestPedido extends Model
{
    /** @use HasFactory<\Database\Factories\GuestPedidoFactory> */
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'total',
        'estado',
        'transaccion_id'
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function guestDetalles(): HasMany
    {
        return $this->hasMany(GuestDetallePedido::class);
    }
}
