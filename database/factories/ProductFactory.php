<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'product_category_id' => null, // Se asignará dinámicamente en el seeder
            'images' => json_encode([
                $this->faker->imageUrl(640, 480, 'products', true, 'Faker'),
                $this->faker->imageUrl(640, 480, 'products', true, 'Faker'),
            ]),
            'slug' => $this->faker->slug(),
            'featured' => $this->faker->boolean(20), // 20% de probabilidades de ser destacado
            'purchase_price' => $this->faker->randomFloat(2, 50, 200),
            'sell_price' => $this->faker->randomFloat(2, 200, 500),
        ];
    }
}
