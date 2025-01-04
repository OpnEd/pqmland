<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'slug',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    // Retorna la ruta dinámica para esta categoría
    public function getRouteAttribute()
    {
        return route('posts', ['category' => $this->slug]);
    }

    // Método estático para obtener el nombre de la relación asociada.
    public static function getRelationName()
    {
        return 'posts';
    }
}
