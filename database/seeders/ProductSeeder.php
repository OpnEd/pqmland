<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Crear 5 categorías
        ProductCategory::factory(5)->create()->each(function ($category) {
            // Para cada categoría, crear entre 3 y 5 productos
            Product::factory(rand(3, 5))->create([
                'product_category_id' => $category->id,
            ]);
        });

        /* // Verifica que haya categorías disponibles
        if (ProductCategory::count() === 0) {
            $this->command->info('No hay categorías de productos. Por favor, ejecuta el seeder de ProductCategory primero.');
            return;
        }

        // Obtén las categorías existentes
        $categories = ProductCategory::all();

        // Crea productos
        $products = [
            [
                'name' => 'Laptop Gamer',
                'description' => 'Una potente laptop diseñada para jugadores exigentes.',
                'product_category_id' => $categories->random()->id,
                'images' => json_encode([
                    'https://example.com/images/laptop1.jpg',
                    'https://example.com/images/laptop2.jpg'
                ]),
                'slug' => Str::slug('Laptop Gamer'),
                'featured' => true,
                'purchase_price' => 1000.00,
                'sell_price' => 1500.00,
            ],
            [
                'name' => 'Smartphone Pro',
                'description' => 'El último modelo de smartphone con características avanzadas.',
                'product_category_id' => $categories->random()->id,
                'images' => json_encode([
                    'https://example.com/images/smartphone1.jpg',
                    'https://example.com/images/smartphone2.jpg'
                ]),
                'slug' => Str::slug('Smartphone Pro'),
                'featured' => false,
                'purchase_price' => 800.00,
                'sell_price' => 1200.00,
            ],
            [
                'name' => 'Auriculares Inalámbricos',
                'description' => 'Auriculares con sonido envolvente y conectividad Bluetooth.',
                'product_category_id' => $categories->random()->id,
                'images' => json_encode([
                    'https://example.com/images/headphones1.jpg',
                    'https://example.com/images/headphones2.jpg'
                ]),
                'slug' => Str::slug('Auriculares Inalámbricos'),
                'featured' => true,
                'purchase_price' => 50.00,
                'sell_price' => 100.00,
            ],
        ];

        // Inserta los productos en la base de datos
        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('Productos insertados correctamente.'); */
    }
}
