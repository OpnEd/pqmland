<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'icon',
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

    // Método estático para obtener el nombre de la relación asociada.
    public static function getRelationName()
    {
        return 'products'; // Cambiar por el nombre de la relación real.
    }
}
