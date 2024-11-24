<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(),
            'cover' => $this->faker->imageUrl(640, 480, 'categories', true, 'Faker'),
            'route' => $this->faker->slug(),
            'slug' => $this->faker->slug(),
        ];
    }
}
