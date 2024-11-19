<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        //1
        Blog::create([
            'user_id' => 1,
            'blog_category_id' => 1,
            'title' => 'Implementación del Sistema de Gestión de Calidad (SGC) en una droguería, taller',
            'cover' => 'img_e1fc2221326dc460a4a3ad22390dee2c.jpg',
            'tags' => ['droguería', 'calidad'],
            'abstract' => 'Damos inicio al taller sobre la implementación del sistema de gestión de calidad en una droguería. Listamos los objetivos que nos proponemos con este taller.',
            'content' => '"<p>Estamos en esta ocasi&oacute;n para hablar sobre la implementaci&oacute;n del sistema de gesti&oacute;n de calidad en establecimientos farmac&eacute;uticos minoristas o droguer&iacute;as. Es un tema un poco largo y con ciertos prerrequisitos.<\/p> <h2>Estado de droguer&iacute;as en Bogot&aacute;<\/h2> <p>Cuando fui funcionario de la Secretar&iacute;a Distrital en Bogot&aacute; realizando visitas de inspecci&oacute;n, vigilancia y control en estos establecimientos, observ&eacute; una preocupante falta de educaci&oacute;n en el sector. Muchas droguer&iacute;as son atendidas por personal que no tiene formaci&oacute;n en el campo, y el Director T&eacute;cnico es un diploma pegado en la pared.<\/p> <h2>Falta educaci&oacute;n en gesti&oacute;n de calidad<\/h2> <p>Tambi&eacute;n observ&eacute; una preocupante la falta de formaci&oacute;n en gesti&oacute;n de la calidad, para lo que deber&iacute;a estar formado cualquier trabajador hoy en d&iacute;a, cuando menos en los fundamentos.<\/p> <h2>Objetivos del proyecto<\/h2> <p>As&iacute; que lo que nos proponemos en t&eacute;rminos generales es desarrollar un curso que permita a quienes lo sigan aprender a planear, implementar, evaluar y mejorar el sistema de gesti&oacute;n de calidad de una droguer&iacute;a, teniendo en mente las normas ISO.<\/p> <ul> <li>Haremos referencia inicialmente al contexto normativo y social, lo cual es importante por ser de all&iacute; de donde emanan los requisitos de los productos y los servicios.<\/li> <li>Se estudiar&aacute;n los conceptos fundamentales de la gesti&oacute;n de la calidad y las relaciones y\/o similitudes que existen entre la normatividad legal vigente y las normas ISO, y c&oacute;mo podemos documentar e implementar nuestro sistema de gesti&oacute;n de acuerdo con estas normas, lo cual es una decisi&oacute;n que trae como beneficio la mejora en la satisfacci&oacute;n del usuario y la disminuci&oacute;n de costos.<\/li> <li>Se revisar&aacute; el instrumento que emplean los entes departamentales o el distrital para la realizaci&oacute;n de una visita de IVC para, sus fundamentos en la normatividad y el prop&oacute;sito de estas visitas.<\/li> <li>Posteriormente se realizar&aacute; una descripci&oacute;n de cada uno de los documentos que conforman el Sistema de Gesti&oacute;n de Calidad y se explicar&aacute; la forma de crear cada uno, incluyendo sugerencias sobre la manera de llevar los registros y mantener todo el sistema.<\/li> <\/ul> <p>Al finalizar tendremos confeccionada cierta variedad de documentos, lo cual deber&iacute;a permitir a cada participante continuar por s&iacute; mismo la documentaci&oacute;n del sistema.<\/p>',
            'slug' => 'implementacion-del-sistema-de-gestion-de-calidad-(sgc)-en-una-drogueria-taller',
            'is_featured' => false,
        ]);

        //2
        Blog::create([
            'user_id' => 1,
            'blog_category_id' => 1,
            'title' => '¿Para qué estarás capacitado cuando hayas realizado este taller?',
            'cover' => 'img_aab9f0475ee5618b185d18b423e2a74f.jpg',
            'tags' => ['droguería', 'calidad'],
            'abstract' => 'Presentación de los contenidos del taller y la metodología',
            'content' => '<p>Antes de responder d&eacute;jame decirte algo. Cuando la autoridad sanitaria llega a visitarte, lo hace para verificar que est&eacute;s cumpliendo con los est&aacute;ndares m&iacute;nimos de seguridad. Estos est&aacute;ndares se encuentran detallados en la normatividad legal vigente. Sin embargo, se debe entender ac&aacute; algo importante:<\/p> <p style=\"padding-left: 40px;\"><em>La normatividad establece las referencias en las que los inspectores se basan para conceptuar acerca de si est&aacute;s cumpliendo o no, m&aacute;s el cumplimiento de los est&aacute;ndares m&iacute;nimos de calidad va m&aacute;s all&aacute; del mero cumplimiento de los requisitos establecidos en ella.<br \/><\/em><\/p> <p>Pues bien, al terminar este taller estar&aacute;s capacitado para atender una visita de Inspecci&oacute;n, Vigilancia y Control de la autoridad sanitaria, con serenidad, sinti&eacute;ndote totalmente seguro porque tienes la documentaci&oacute;n de todos tus procesos al d&iacute;a y esto debido a que comprendes claramente la misi&oacute;n de las droguer&iacute;as, su responsabilidad frente a la comunidad, c&oacute;mo documentar su sistema de gesti&oacute;n, y c&oacute;mo implementarlo, evaluarlo y sostenerlo.<\/p> <h2>Competencias que pretende desarrollar<\/h2> <hr \/> <p>M&aacute;s concretamente &iquest;qu&eacute; se proponer el taller?<\/p> <p>Advirtiendo que hace falta la definici&oacute;n del concepto de <a title=\"&iquest;qu&eacute; son las competencias?\" href=\"https:\/\/www.mineducacion.gov.co\/1621\/w3-printer-299611.html\" target=\"_blank\" rel=\"noopener\">competencias<\/a>, al desarrollar este taller el talento humano de las droguer&iacute;as:<\/p> <ul> <li>Comprender&aacute; la naturaleza particular del negocio de las droguer&iacute;as frente a otros tipos de negocios tipo tienda.<\/li> <li>Comprender&aacute; el rol que juegan las droguer&iacute;as en el concierto de la salud p&uacute;blica y la responsabilidad que tienen frente a esta.<\/li> <li>Conocer&aacute;n el concepto de riesgo en el contexto del uso de los medicamentos y la salud p&uacute;blica y sabr&aacute;n c&oacute;mo gestionarlo.<\/li> <li>Comprender&aacute; los conceptos de Calidad, Gesti&oacute;n de la Calidad y Sistema de Gesti&oacute;n de la Calidad de acuerdo con la normatividad el Ministerio de Salud y las Normas ISO 9000<\/li> <li>Comprender&aacute; la relaci&oacute;n entre cultura y calidad.<\/li> <li>Sabr&aacute; c&oacute;mo: <ul style=\"list-style-type: square;\"> <li>crear el manual de calidad, caracterizar los procesos, describir los procedimientos<\/li> <li>establecer puntos de control y registros<\/li> <li>llevar indicadores de gesti&oacute;n<\/li> <li>realizar una autoinspecci&oacute;n<\/li> <li>crear planes de acci&oacute;n preventivos, correctivos y de mejora continua<\/li> <li>hacer seguimiento a los planes de acci&oacute;n<\/li> <li>crear una matriz de riesgos<\/li> <li>evaluar la satisfacci&oacute;n del cliente y presentar el informe respectivo<\/li> <li>elaborar cronogramas (capacitaciones, autoinspecciones, mantenimiento, limpieza) y hacer seguimiento a su cumplimiento<\/li> <li>brindar educaci&oacute;n al usuario sobre el uso racional de medicamentos y estilos de vida saludable<\/li> <li>promover la notificaci&oacute;n de reacciones adversas y recibirlas en caso de presentarse<\/li> <li>Demarcar las &aacute;reas de la droguer&iacute;a y hacer un uso correcto de las mismas<\/li> <li>Hacer correcta recepci&oacute;n y almacenamiento de los productos<\/li> <li>Otras<\/li> <\/ul> <\/li> <\/ul> <p>Como se ve, se trata de un abanico de competencias que incluye competencias operativas tanto como un enriquecimiento conceptual que ayuda al desarrollo de criterios t&eacute;cnicos.<\/p> <p>En la pr&oacute;xima entrega se hablar&aacute; sobre la metodolog&iacute;a que seguiremos para logar el desarrollo de estas competencias.<\/p>',
            'slug' => 'para-que-estaras-capacitado-cuando-hayas-realizado-este-taller',
            'is_featured' => false,
        ]);

        //3
        Blog::create([
            'user_id' => 1,
            'blog_category_id' => 1,
            'title' => 'Metodología que seguiremos en el taller',
            'cover' => 'img_2e77c739036db618ebe36dfd40907078.jpg',
            'tags' => ['evaluación', 'mejora contina', 'droguería', 'ISO 900'],
            'abstract' => 'Se aborda la problemática de manera práctica, tomando en primera instancia la última acta de la visita de la SDS. Pasando a continuación al estudio de los conceptos en las fuentes normativas legales y técnicas.',
            'content' => '<p>Se expondr&aacute;n algunos contenidos de una manera formal o te&oacute;rica y algotros desde la pr&aacute;ctica en el campo de juego, de tal manera que queden ligados en el ejercicio los conceptos te&oacute;ricos con la cotidianidad del trabajo en las droguer&iacute;as.<\/p> <p>La gesti&oacute;n de la calidad es un trabajo c&iacute;clico, en el cual, seg&uacute;n un orden que no se da estrictamente en la realidad del desempe&ntilde;o organizacional:<\/p> <ol> <li>en primer lugar, se planean los procesos, es decir, se establece qu&eacute; se debe hacer para fabricar los productos, o prestar los servicios que la organizaci&oacute;n oferta, y qui&eacute;nes deben hacerlo,<\/li> <li>en segundo lugar, se ejecutan los procesos, lo establecido en la etapa anterior,<\/li> <li>en tercer lugar, se hace una evaluaci&oacute;n del desempe&ntilde;o de esos procesos y de la organizaci&oacute;n (droguer&iacute;a) como un todo y, para terminar,<\/li> <li>en cuarto lugar, se planean y ejecutan acciones frente a los resultados obtenidos en la anterior evaluaci&oacute;n.<\/li> <\/ol> <p>Para el desarrollo del taller comenzaremos por la tercera etapa, es decir, por la evaluaci&oacute;n del desempe&ntilde;o de los procesos, ya que tomaremos la &uacute;ltima acta de la visita de la autoridad sanitaria y partiremos de los requerimientos all&iacute; consignados, estableciendo frente a ellos un plan de acci&oacute;n.<\/p> <p>En esta etapa del ciclo de la gesti&oacute;n de la calidad abordaremos los procesos de Evaluaci&oacute;n y mejora. Dentro de este proceso encontramos procedimientos para realizar autoinspecciones, programas de auditor&iacute;as, planes de auditor&iacute;as, informes de autoinspecciones, planes de acciones correctivas y preventivas, entre otros.<\/p> <p>Todo esto sin embargo nos obliga a pasar al estudio de los conceptos la etapa de Evaluaci&oacute;n y Mejora del ciclo PHVA en la normatividad y sobre todo en las Normas ISO 9000, 9001, 19011 y otras. All&iacute; encontraremos definiciones y requisitos, y apoyo para comprender el sentido, la utilidad e indicaciones de la implementaci&oacute;n de los procesos de evaluaci&oacute;n y mejora continua.<\/p> <p>Despu&eacute;s de dar inicio al taller por este aspecto del sistema de gesti&oacute;n de calidad, un tema nos llevar&aacute; al otro, y continuaremos la din&aacute;mica de abordar proceso por proceso en su desempe&ntilde;o cotidiano y sus aspectos conceptuales en las normas, hasta que al final hayamos estudiado e implementado cada uno de los aspectos o componentes del sistema.<\/p> <p>Al final de cada secci&oacute;n se encontrar&aacute; una evaluaci&oacute;n cuyo objetivo es principalmente se&ntilde;alar los puntos m&aacute;s importantes de los contenidos que acaban de abordarse y que de ser necesario deber&iacute;an volver a ser retomados.<\/p> <p>Espero sea de mucha utilidad todo este contenido.<\/p>',
            'slug' => 'metodologia-que-seguiremos-en-el-taller',
            'is_featured' => false,
        ]);

        //4
        Blog::create([
            'user_id' => 1,
            'blog_category_id' => 1,
            'title' => 'Metodología que seguiremos en el taller segunda etapa',
            'cover' => 'img_2e77c739036db618ebe36dfd40907078.jpg',
            'tags' => ['evaluación', 'mejora contina', 'droguería', 'ISO 900'],
            'abstract' => 'Se aborda la problemática de manera práctica, tomando en primera instancia la última acta de la visita de la SDS. Pasando a continuación al estudio de los conceptos en las fuentes normativas legales y técnicas.',
            'content' => '<p>Se expondr&aacute;n algunos contenidos de una manera formal o te&oacute;rica y algotros desde la pr&aacute;ctica en el campo de juego, de tal manera que queden ligados en el ejercicio los conceptos te&oacute;ricos con la cotidianidad del trabajo en las droguer&iacute;as.<\/p> <p>La gesti&oacute;n de la calidad es un trabajo c&iacute;clico, en el cual, seg&uacute;n un orden que no se da estrictamente en la realidad del desempe&ntilde;o organizacional:<\/p> <ol> <li>en primer lugar, se planean los procesos, es decir, se establece qu&eacute; se debe hacer para fabricar los productos, o prestar los servicios que la organizaci&oacute;n oferta, y qui&eacute;nes deben hacerlo,<\/li> <li>en segundo lugar, se ejecutan los procesos, lo establecido en la etapa anterior,<\/li> <li>en tercer lugar, se hace una evaluaci&oacute;n del desempe&ntilde;o de esos procesos y de la organizaci&oacute;n (droguer&iacute;a) como un todo y, para terminar,<\/li> <li>en cuarto lugar, se planean y ejecutan acciones frente a los resultados obtenidos en la anterior evaluaci&oacute;n.<\/li> <\/ol> <p>Para el desarrollo del taller comenzaremos por la tercera etapa, es decir, por la evaluaci&oacute;n del desempe&ntilde;o de los procesos, ya que tomaremos la &uacute;ltima acta de la visita de la autoridad sanitaria y partiremos de los requerimientos all&iacute; consignados, estableciendo frente a ellos un plan de acci&oacute;n.<\/p> <p>En esta etapa del ciclo de la gesti&oacute;n de la calidad abordaremos los procesos de Evaluaci&oacute;n y mejora. Dentro de este proceso encontramos procedimientos para realizar autoinspecciones, programas de auditor&iacute;as, planes de auditor&iacute;as, informes de autoinspecciones, planes de acciones correctivas y preventivas, entre otros.<\/p> <p>Todo esto sin embargo nos obliga a pasar al estudio de los conceptos la etapa de Evaluaci&oacute;n y Mejora del ciclo PHVA en la normatividad y sobre todo en las Normas ISO 9000, 9001, 19011 y otras. All&iacute; encontraremos definiciones y requisitos, y apoyo para comprender el sentido, la utilidad e indicaciones de la implementaci&oacute;n de los procesos de evaluaci&oacute;n y mejora continua.<\/p> <p>Despu&eacute;s de dar inicio al taller por este aspecto del sistema de gesti&oacute;n de calidad, un tema nos llevar&aacute; al otro, y continuaremos la din&aacute;mica de abordar proceso por proceso en su desempe&ntilde;o cotidiano y sus aspectos conceptuales en las normas, hasta que al final hayamos estudiado e implementado cada uno de los aspectos o componentes del sistema.<\/p> <p>Al final de cada secci&oacute;n se encontrar&aacute; una evaluaci&oacute;n cuyo objetivo es principalmente se&ntilde;alar los puntos m&aacute;s importantes de los contenidos que acaban de abordarse y que de ser necesario deber&iacute;an volver a ser retomados.<\/p> <p>Espero sea de mucha utilidad todo este contenido.<\/p>',
            'slug' => 'metodologia-que-seguiremos-en-el-taller-segunda-etapa',
            'is_featured' => false,
        ]);

        // Crear 20 registros
        for ($i = 0; $i < 20; $i++) {
            // Obtener un usuario y una categoría aleatoria
            $user = User::inRandomOrder()->first();
            $category = BlogCategory::inRandomOrder()->first();

            // Generar una fecha aleatoria en los últimos 6 meses
            $created_at = $faker->dateTimeBetween('-6 months', 'now');

            // Generar tags en formato adecuado
            $tags = collect($faker->words(4))->map(function ($tag) {
                return Str::slug($tag, ' ');
            });

            Blog::create([
                'user_id' => $user->id,
                'blog_category_id' => $category->id,
                'title' => $faker->unique()->sentence(6),
                'cover' => 'default.jpg', // Asegúrate de tener una imagen de prueba en 'storage/app/public/images'
                'tags' => $tags, // Array de etiquetas
                'abstract' => $faker->sentence(20),
                'content' => $faker->paragraphs(5, true),
                'slug' => Str::slug($faker->unique()->sentence(6)),
                'is_featured' => $faker->boolean(30), // 30% de probabilidad de que sea destacado
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}

/* Detalles de Implementación:
User::inRandomOrder()->first() y BlogCategory::inRandomOrder()->first(): Seleccionan un usuario y una categoría al azar.
$faker->dateTimeBetween('-6 months', 'now'): Genera una fecha aleatoria entre los últimos 6 meses y la fecha actual.
json_encode($faker->words(4)): Crea un campo tags con 4 palabras aleatorias en formato JSON.
$faker->unique()->sentence(6) y Str::slug(): Generan títulos únicos y convierten el título en un slug único. */
