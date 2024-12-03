<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_category_id',
        'images',
        'slug',
        'featured',
        'featured_description',
        'publicity',
        'purchase_price',
        'sell_price',
    ];

    protected $casts = [
        'images' => 'array',
        'featured' => 'boolean',
        'purchase_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function scopeFeatured ($query)
    {
        $query->where('featured', true);
    }

    public function scopeWithCategory ($query, string $category)
    {
        $query->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
