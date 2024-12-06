<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Carga las categorías de la base de datos
        $categories = ProductCategory::all(['name', 'slug'])->toArray();

        // Fusiona las categorías en la configuración
        config(['categories' => $categories]);
    }
}
