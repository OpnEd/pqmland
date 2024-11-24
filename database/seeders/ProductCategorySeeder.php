<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electrónica',
                'description' => 'Encuentra los mejores productos de tecnología y electrónica.',
                'cover' => 'electronics-cover.jpg',
                'route' => 'categorias.electronica',
                'slug' => Str::slug('Electrónica'),
            ],
            [
                'name' => 'Ropa',
                'description' => 'Moda para todas las estaciones y estilos.',
                'cover' => 'clothing-cover.jpg',
                'route' => 'categorias.ropa',
                'slug' => Str::slug('Ropa'),
            ],
            [
                'name' => 'Hogar',
                'description' => 'Productos para mejorar y decorar tu hogar.',
                'cover' => 'home-cover.jpg',
                'route' => 'categorias.hogar',
                'slug' => Str::slug('Hogar'),
            ],
            [
                'name' => 'Juguetes',
                'description' => 'Divertidos juguetes para todas las edades.',
                'cover' => 'toys-cover.jpg',
                'route' => 'categorias.juguetes',
                'slug' => Str::slug('Juguetes'),
            ],
            [
                'name' => 'Deportes',
                'description' => 'Equipo y accesorios deportivos de alta calidad.',
                'cover' => 'sports-cover.jpg',
                'route' => 'categorias.deportes',
                'slug' => Str::slug('Deportes'),
            ],
        ];

        foreach ($categories as $category) {
            DB::table('product_categories')->insert(array_merge($category, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
