<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'product_category_id',
        'images',
        'slug',
        'base_price',
    ];

    protected $casts = [
        'images' => 'array',
        'base_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function taxes(): BelongsToMany
    {
        return $this->belongsToMany(Tax::class, 'product_tax');
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_product')->withTimestamps();
    }

    public function scopeFeatured($query)
    {
        return $query->whereHas('discounts', function ($q) {
            $q->where('is_active', true); // Solo descuentos activos
        });
    }

    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                // Obtener la categoría del producto
                $categoryName = $this->category->name ?? 'default';

                // Obtener la primera imagen del array
                $imageName = $this->images[0] ?? 'default-image.png';

                // Construir la ruta de la imagen
                $imagePath = $this->image
                    ? "images/tienda/{$categoryName}/{$imageName}"
                    : "images/tienda/default-image.png";

                // Generar URL absoluta usando Storage
                return Storage::url($imagePath);
            }
        );
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    public function calculateFinalPrice()
    {
        $price = $this->base_price;

        // Aplicar todos los descuentos activos
        $totalDiscount = 0;
        foreach ($this->discounts as $discount) {
            if ($discount->is_active) {
                $totalDiscount += $discount->type === 'percentaje'
                    ? $price * ($discount->value / 100)
                    : $discount->value;
            }
        }
        $price -= $totalDiscount;

        // Calcular impuestos
        $taxDetails = [];
        $inclusiveTaxes = 0;
        $exclusiveTaxes = 0;

        foreach ($this->taxes as $tax) {
            $taxAmount = $price * ($tax->rate / 100);

            $taxDetails[] = [
                'name' => $tax->name,
                'rate' => $tax->rate,
                'amount' => $taxAmount,
                'is_inclusive' => $tax->is_inclusive,
            ];

            if ($tax->is_inclusive) {
                $inclusiveTaxes += $taxAmount;
            } else {
                $exclusiveTaxes += $taxAmount;
            }
        }

        // Calcular el precio final (solo sumar impuestos exclusivos)
        $finalPrice = $price + $exclusiveTaxes;

        return [
            'base_price' => $this->base_price,
            'total_discount' => round($totalDiscount, 2),
            'discounts' => $this->discounts->map(function ($discount) {
                return [
                    'name' => $discount->name,
                    'type' => $discount->type,
                    'value' => $discount->value,
                ];
            })->toArray(),
            'taxes' => $taxDetails,
            'inclusive_taxes' => round($inclusiveTaxes, 2),
            'exclusive_taxes' => round($exclusiveTaxes, 2),
            'final_price' => round($finalPrice, 2),
        ];
    }
}

/*
$product = Product::with(['taxes', 'discounts'])->find(1); // Cargar impuestos y descuentos
$priceDetails = $product->calculateFinalPrice();

dd($priceDetails);

Esto devolverá un arreglo con el precio base, descuentos aplicados, impuestos (desglosados) y el precio final, listo para usarse en el backend o enviarse al frontend.

*/
