<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ricardo',
            'last_name' => 'Álvarez M.',
            'email' => 'rialmon@gmail.com',
            'password' => bcrypt('password'),
            'profile_photo_path' => 'profile-photos/AZvQwwwlgrlQwGkMjGMSLIlzumbmrc9khjqkhumx.png',
            'degree' => 'Químico Farmacéutico',
            'professional_profile' => 'Soy Químico Farmacéutico experimentado y un apasionado por la ciencia y la tecnología.
                                        Cuento con experiencias laborales en un amplio rango de ocupaciones profesionales:
                                        Centrales de Mezclas Parenterales, IPSs de alta complejidad, Depósitos de Medicamentos,
                                        Entes Regulatorios e Instituciones Educativas.',
            'colaborator' => 1,
            'current_position' => 'CEO y Fundador de PQM, Q.F., Ex-Inspector SDS.',
            'phone_number' => '+57 314 309 5251',
            'birth_date' => '13-10-2024',
            'cv_published' => true,
            'slug' => 'ricardo-alvarez-m',
        ]);
    }
}
