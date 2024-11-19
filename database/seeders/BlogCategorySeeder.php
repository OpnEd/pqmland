<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::create([
            'name' => 'Gestión de Calidad',
            'description' => 'Gestión de calidad en las droguerías.'
        ]);
        BlogCategory::create([
            'name' => 'Calibración de equipos',
            'description' => 'Calibración de equipos en las droguerías.'
        ]);
        BlogCategory::create([
            'name' => 'Control de plagas',
            'description' => 'Control de plagas en las droguerías.'
        ]);
        BlogCategory::create([
            'name' => 'Autoinspecciones',
            'description' => 'Autoinspecciones en las droguerías.'
        ]);
        BlogCategory::create([
            'name' => 'Promoción del uso racional',
            'description' => 'Promoción del uso racional en las droguerías.'
        ]);
    }
}
