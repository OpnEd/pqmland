<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonios')->insert([
            [
                'nombre' => 'Juan Pérez',
                'cargo' => 'Gerente de Ventas',
                'foto' => 'fotos/juan_perez.jpg',
                'titulo' => 'Excelente Servicio',
                'contenido' => 'Estoy muy satisfecho con el servicio recibido. ¡Altamente recomendado!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Ana Gómez',
                'cargo' => 'Directora de Marketing',
                'foto' => 'fotos/ana_gomez.jpg',
                'titulo' => 'Gran Experiencia',
                'contenido' => 'La experiencia fue fantástica. El equipo es muy profesional y atento.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'nombre' => 'Carlos López',
                'cargo' => 'CEO',
                'foto' => 'fotos/carlos_lopez.jpg',
                'titulo' => 'Servicio Excepcional',
                'contenido' => 'El servicio superó mis expectativas. Definitivamente volveré a usarlo.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
