<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ricardo',
            'last_name' => 'Álvarez M.',
            'email' => 'rialmon@gmail.com',
            'profile_photo_path' => 'profile-photos/AZvQwwwlgrlQwGkMjGMSLIlzumbmrc9khjqkhumx.png',
            'degree' => 'Químico Farmacéutico',
            'professional_profile' => 'Soy Químico Farmacéutico experimentado y un apasionado por la ciencia y la tecnología.
                                        Cuento con experiencias laborales en un amplio rango de ocupaciones profesionales:
                                        Centrales de Mezclas Parenterales, IPSs de alta complejidad, Depósitos de Medicamentos,
                                        Entes Regulatorios e Instituciones Educativas.',
            'current_position' => 'CEO y Fundador de PQM, Q.F., Ex-Inspector SDS.',
            'phone_number' => '+57 314 309 5251',
            'birth_date' => '13-10-2024',
            'cv_published' => true,
            'slug' => 'ricardo-alvarez-m',
        ]);

        $this->call([
            BlogCategorySeeder::class,
            BlogSeeder::class,
            CommentSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
