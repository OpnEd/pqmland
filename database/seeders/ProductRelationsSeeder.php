<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener instancias de prueba
        $product1 = Product::find(1);

        $product2 = Product::find(3);

        // Obtener impuestos y descuentos
        $iva = Tax::where('name', 'IVA')->first();
        $otroImpuesto = Tax::where('name', 'Otro Impuesto')->first();

        $descuento10 = Discount::where('name', 'Descuento 10%')->first();
        $descuentoFijo = Discount::where('name', 'Descuento fijo $5000')->first();

        // Asociar impuestos y descuentos a productos
        $product1->taxes()->attach([$iva->id, $otroImpuesto->id]);
        $product2->taxes()->attach([$iva->id]);

        $product1->discounts()->attach([$descuento10->id, $descuentoFijo->id]);
        $product2->discounts()->attach([$descuento10->id]);
    }
}
