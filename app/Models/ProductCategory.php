<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cover',
        'route',
        'slug',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Retorna la ruta dinámica para esta categoría
    public function getRouteAttribute()
    {
        return route('tienda', ['category' => $this->slug]);
    }
}
