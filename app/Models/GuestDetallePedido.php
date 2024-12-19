<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuestDetallePedido extends Model
{
    /** @use HasFactory<\Database\Factories\GuestDetallePedidoFactory> */
    use HasFactory;

    protected $fillable = [
        'guest_pedido_id',
        'product_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
        'impuestos',
        'descuentos',
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'impuestos' => 'decimal:2',
        'descuentos' => 'decimal:2',
    ];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(GuestPedido::class);
    }
}
