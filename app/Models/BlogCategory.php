<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;

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
}
