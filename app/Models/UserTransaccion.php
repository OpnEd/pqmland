<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTransaccion extends Model
{
    protected $fillable = [
        'pedido_id',
        'transaccion_id',
        'monto',
        'estado',
        'datos',
    ];

    protected $casts = [
        'datos' => 'array',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
