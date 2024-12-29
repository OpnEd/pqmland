<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'document_type',
        'document',
        'city',
        'address',
        'phone_number',
        'company_name',
    ];

    public function pedidos(): HasMany
    {
        return $this->hasMany(GuestPedido::class);
    }
}
