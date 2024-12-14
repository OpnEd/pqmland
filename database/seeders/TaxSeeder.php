<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tax::insert([
            [
                'name' => 'IVA',
                'rate' => 19.00,
                'is_inclusive' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Otro Impuesto',
                'rate' => 10.00,
                'is_inclusive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
