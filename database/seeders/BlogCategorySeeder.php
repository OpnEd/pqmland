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
            'description' => 'Gestión de calidad en las droguerías.',
            'icon' => 'https://img.icons8.com/?size=100&id=24285&format=png&color=000000',
            'slug' => 'gestion-de-calidad'
        ]);
        BlogCategory::create([
            'name' => 'Calibración de equipos',
            'description' => 'Calibración de equipos en las droguerías.',
            'icon' => 'https://img.icons8.com/?size=100&id=82535&format=png&color=000000',
            'slug' => 'calibracion-de-equipos'
        ]);
        BlogCategory::create([
            'name' => 'Control de plagas',
            'description' => 'Control de plagas en las droguerías.',
            'icon' => 'https://img.icons8.com/?size=100&id=16135&format=png&color=000000',
            'slug' => 'control-de-plagas'
        ]);
        BlogCategory::create([
            'name' => 'Autoinspecciones',
            'description' => 'Autoinspecciones en las droguerías.',
            'icon' => 'https://img.icons8.com/?size=100&id=W5ufHFPFwaDN&format=png&color=000000',
            'slug' => 'autoinspecciones'
        ]);
        BlogCategory::create([
            'name' => 'Promoción del uso racional',
            'description' => 'Promoción del uso racional en las droguerías.',
            'icon' => 'https://img.icons8.com/?size=100&id=sVbJpuZsX9Wg&format=png&color=000000',
            'slug' => 'promocion-del-uso-racional-de-los-medicamentos'
        ]);
    }
}
