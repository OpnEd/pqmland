<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WelcomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('welcome_pages')->insert([
            // Hero Section
            [
                'type' => 'hero',
                'title' => 'Eleva a otro nivel los Sistemas de Gestión de tu droguería con nuestros sistemas basados en la nube',
                'subtitle' => 'Simplifica los registros y procedimientos diarios con soluciones digitales de vanguardia',
                'content' => null,
                'image' => 'hero-image', // Asegúrate de tener esta imagen en storage/app/public/images/
                'buttons' => json_encode([
                    ['text' => '¡Comieza ahora!', 'url' => 'register'],
                    ['text' => 'Contáctanos', 'url' => 'contacto']
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Features Section
            [
                'type' => 'features',
                'title' => 'Acceso a la nube en tiempo real',
                'subtitle' => null,
                'content' => 'Gestiona los procesos de calidad de tu droguería en cualquier momento, desde cualquier lugar',
                'image' => '<i class="bi bi-pc-display" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Registros diarios al alcance de unos clicks',
                'subtitle' => null,
                'content' => 'Garantiza la precisión y el cumplimiento del mantenimiento de registros en los momentos requeridos',
                'image' => '<i class="bi bi-cursor" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Indicadores de Gestión',
                'subtitle' => null,
                'content' => 'Automáticamente, obtén indicadores que te informan el desempeño de los procesos día a día',
                'image' => '<i class="bi bi-bar-chart-line" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Procedimientos y formularios integrales',
                'subtitle' => null,
                'content' => 'Accede y diligencia o modifica digitalmente todos los procedimientos y formularios necesarios',
                'image' => '<i class="bi bi-file-earmark-pdf" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Cronogramas',
                'subtitle' => null,
                'content' => 'En un solo calendario, sin esfuerzo, clickea y regista los cronogramas que te exige el Sistema de Gestión: capacitaciones, autoinspecciones, mantenimientos, limpieza y sanitizaciones, entre otros',
                'image' => '<i class="bi bi-calendar-week" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Autoinspecciones y Planes de Mejora',
                'subtitle' => null,
                'content' => 'Mantén tu droguería al día efectuando autoinspecciones periódicas y ejecuando planes de acción frente a posibles hallazgos negativos',
                'image' => '<i class="bi bi-search" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Capacitación y asesoría',
                'subtitle' => null,
                'content' => 'Benefíciate de la experiencia y el conocimiento de exfuncionarios de la Secretaría de Salud',
                'image' => '<i class="bi bi-easel" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Fácil preparación para la auditoría',
                'subtitle' => null,
                'content' => 'Simplifica las auditorías con documentación digital organizada, lista para la Secretaría de Salud',
                'image' => '<i class="bi bi-folder-check" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'features',
                'title' => 'Cumplimiento mejorado',
                'subtitle' => null,
                'content' => 'Manténte a la vanguardia de las regulaciones de Salud y Hacienda con nuestras funciones de cumplimiento actualizadas',
                'image' => '<i class="bi bi-graph-up-arrow" style="font-size: 3rem; color: cornflowerblue; margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Benefits Section
            [
                'type' => 'benefits',
                'title' => 'Incremento de la eficiencia',
                'subtitle' => null,
                'content' => 'Ahorra tiempo y reduce errores con procesos digitales',
                'image' => '<i class="bi bi-file-bar-graph-fill" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'benefits',
                'title' => 'Mejor organización y conservación',
                'subtitle' => null,
                'content' => 'Asegura la organización y la conservación de tus registros y documentos',
                'image' => '<i class="bi bi-infinity" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'benefits',
                'title' => 'Mayor accesibilidad',
                'subtitle' => null,
                'content' => 'Accede a todos tus documentos importantes desde cualquier dispositivo',
                'image' => '<i class="bi bi-phone" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'benefits',
                'title' => 'Auditorías simplificadas',
                'subtitle' => null,
                'content' => 'Esté preparado para la auditoría con todos los registros y procedimientos a su alcance',
                'image' => '<i class="bi bi-file-earmark-check" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'benefits',
                'title' => 'Seguridad mejorada',
                'subtitle' => null,
                'content' => 'Proteja la información confidencial con seguridad en la nube de primer nivel',
                'image' => '<i class="bi bi-file-earmark-lock" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'benefits',
                'title' => 'Información actualizada',
                'subtitle' => null,
                'content' => 'Accede a capacitaciones sobre nuevas disposiciones normativas o a lo último del estado del arte',
                'image' => '<i class="bi bi-info-circle" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'benefits',
                'title' => 'Mejor control',
                'subtitle' => null,
                'content' => 'Toma el control de tu inventario, compras, ventas y ganancias',
                'image' => '<i class="bi bi-coin" style="font-size: 2rem; color: rgb(68, 126, 250); margin: 15px;"></i>',
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Testimonios Section
            [
                'type' => 'testimonio',
                'title' => 'Juan Pérez, Gerente de Droguerías XYZ',
                'subtitle' => null,
                'content' => 'Este software transformó nuestra operación. Es increíblemente fácil de usar y eficiente.',
                'image' => null,
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'testimonio',
                'title' => 'María García, CEO de FarmaTech',
                'subtitle' => null,
                'content' => 'Gracias a esta solución, hemos ahorrado tiempo y dinero mientras mejoramos la calidad.',
                'image' => null,
                'buttons' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //CTA section
            [
                'type' => 'cta',
                'title' => 'Listo para transformar el Sistema de Gestión de tu droguería?',
                'subtitle' => 'Únete a muchos otros que han optimizado sus procesos y mejorado el cumplimiento',
                'content' => null,
                'image' => null,
                'buttons' => json_encode([
                    ['text' => '¡Solicita tu prueba gratis!', 'url' => 'register'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
