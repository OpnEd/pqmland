<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Crear 5 categorías
        /* ProductCategory::factory(5)->create()->each(function ($category) {
            // Para cada categoría, crear entre 3 y 5 productos
            Product::factory(rand(3, 5))->create([
                'product_category_id' => $category->id,
            ]);
        }); */

        /* // Verifica que haya categorías disponibles
        if (ProductCategory::count() === 0) {
            $this->command->info('No hay categorías de productos. Por favor, ejecuta el seeder de ProductCategory primero.');
            return;
        }

        // Obtén las categorías existentes
        $categories = ProductCategory::all(); */

        // Crea productos
        $products = [
            [
                'name' => 'Bálsamo con CBD',
                'description' => 'Nabico Balsamo combina aceites naturales de Cannabis, Caléndula, Árnica y Romero en una delicada presentación ideal para disminuir la tensión muscular, hidratar la piel, estimular la recuperación y el descanso del cuerpo. Su practica presentación en lata de aluminio de 60g con efecto caliente es ideal para dejar en tu mesa de noche y usarla antes de dormir. Lata en aluminio que conserva de forma efectiva los ingredientes. No contiene mentol. Registro Invima NSOC79820-17CO. Producto de uso tópico y venta libre. CALÉNDULA: Contribuye a regenerar la piel y producir colágeno. Es muy recomendable para tratar cicatrices. ÁRNICA: Ayuda a reducir la hinchazón y disminuir el dolor. ROMERO: Tiene propiedades antiinflamatorias y antiespasmódicas.',
                'product_category_id' => 1,
                'images' => [
                    'balsamo-60-g',
                ],
                'slug' => Str::slug('Bálsamo con CBD'),
                'featured' => true,
                'featured_description' => 'Descuento hasta del 25%',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Gel con CBD',
                'description' => 'Nabico gel combina ingredientes naturales ideales para disminuir la tensión muscular y estimular la recuperación y el descanso del cuerpo. Su practica presentación es ideal para viajes.
• Ideal para masajear.
• Olor mentolado.
• Efecto de frescura y descanso después de aplicado
• Registro Invima NSOC09187-21CO
• Producto de uso tópico y venta libre.
ALCANFOR: Es un aceite natural utilizado para aliviar dolores musculares.
MENTOL: Es un alcohol secundario saturado que brinda una sensación de frescura cuando se aplica sobre la piel.
ACEITE DE PINO: Es un aceite esencial natural que ayuda a limpiar de virus, bacterias y mucosidad las vías respiratorias.',
                'product_category_id' => 1,
                'images' => [
                    'gel-120-ml',
                ],
                'slug' => Str::slug('Gel con CBD'),
                'featured' => false,
                'featured_description' => '',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Gel con CBD Sachet',
                'description' => 'Nabico gel combina ingredientes naturales ideales para para disminuir la tensión muscular y estimular la recuperación y el descanso del cuerpo.
• Ideal para masajear.
• Olor mentolado.
• Efecto de frescura y descanso después de aplicado
• Registro Invima NSOC09187-21CO
• Producto de uso tópico y venta libre.
ALCANFOR: Es un aceite natural utilizado para aliviar dolores musculares.
MENTOL: Es un alcohol secundario saturado que brinda una sensación de frescura cuando se aplica sobre la piel.
ACEITE DE PINO: Es un aceite esencial natural que ayuda a limpiar de virus, bacterias y mucosidad las vías respiratorias.',
                'product_category_id' => 1,
                'images' => [
                    'sachet-30-ml',
                ],
                'slug' => Str::slug('Gel con CBD Sachet'),
                'featured' => false,
                'featured_description' => '',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Crema con CBD para piernas cansadas',
                'description' => 'Nabico Crema para piernas cansadas combina extractos naturales para mejorar la circulación, ayudar a la recuperación de los músculos y mejorar el aspecto de tus piernas. Revitaliza tus piernas dejándolas suaves y hermosas.
• Sensación relajante
• Registro Invima NSOC43344-11CO
• Producto de uso tópico y venta libre.
Además del aceite de semilla de cannabis sativa, su formula contiene:
CALÉNDULA : ayuda a regenerar la piel y producir colágeno,
GINKGO BILOBA: Tiene propiedades antioxidantes que protegen contra el daño celular oxidativo de radicales libres.',
                'product_category_id' => 1,
                'images' => [
                    'piernas-120-ml',
                ],
                'slug' => Str::slug('Crema con CBD para piernas cansadas'),
                'featured' => false,
                'featured_description' => '',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Sales efervescentes',
                'description' => 'Nabico Sales de Descanso es una fórmula exclusiva que mezcla ingredientes naturales en una novedosa presentación efervescente. Sus ingredientes ofrecen un descanso ideal a tus pies.
Ingredientes las cuales tienen efectos Antinflamatorio y relajante. Además, tienen propiedades para aliviar dolores musculares y mejorar la circulación.
• Combinación de sales , aceites esenciales y CBD.
• Efecto de descanso y relajación en los pies.
• Registro Invima NSOC13037-22CO
• Producto de uso tópico y venta libre.
Este exclusiva formula mezcla Acido Cítrico, Bicarbonato de sodio, Aceite de coco virgen, Mezcla de sales, Aceites Esenciales y CBD.',
                'product_category_id' => 1,
                'images' => [
                    'efervescente-200-g',
                ],
                'slug' => Str::slug('Sales efervescentes'),
                'featured' => true,
                'featured_description' => 'Descuento hasta del 15%',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Óleo corporal',
                'description' => 'Nabico Oleo Corporal es una receta de aceites naturales que relajan, hidratan y restauran tu piel. Ideal para hacer masajes de relajación o
descanso. También puedes agregarlo en tu rutina diaria de cuidado para tu piel.
• Mezcla de aceites naturales.
• Olor agradable y delicado.
• Registro Invima NSOC13041-22CO
• Producto de uso tópico y venta libre.
Además del aceite de semilla de cannabis sativa y aceite CBD, su formula contiene:
Aceite de Limonaria: Este aceite esencial tiene numerosas propiedades terapéuticas y otras tantas aplicaciones. Destacan sus propiedades antimicrobianas, antivirales, ansiolíticas, circulatorias y antiinflamatorias.
Aceite de almendra dulce. Gracias a su acción emoliente puede aplicarse en el cuerpo para dejar la piel agradablemente suave sin necesidad de usar una crema hidratante.',
                'product_category_id' => 1,
                'images' => [
                    'oleo-coprporal-120-ml',
                ],
                'slug' => Str::slug('Óleo corporal'),
                'featured' => false,
                'featured_description' => '',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Crema para Callos',
                'description' => 'Nabico Crema para Callos es formulada con glicerina, derivado de vitamina E (Acetato de Tocoferilo) y Aloe vera, que ayuda a humectar y disminuir la resequedad de la piel de los pies. Contiene además ácido láctico, conocido exfoliante que ayuda a disminuir asperezas y callosidades de los pies, dejando la piel suave.
• Humecta y exfolia
• Olor agradable y delicado.
• Registro Invima NSOC99174-20CO
• Producto de uso tópico y venta libre.
Cannabis: Contribuye en la recuperación frente a las agresiones cutáneas Vitamina E : Te ayuda a proteger la piel delicada tiene propiedades antioxidantes.
Aloe vera: Estimula la producción de colágeno y de elastina en la piel a la vez, también es hidratante.',
                'product_category_id' => 1,
                'images' => [
                    'crema-cayos-60-ml',
                ],
                'slug' => Str::slug('Crema para Callos'),
                'featured' => false,
                'featured_description' => '',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
            [
                'name' => 'Aerosol Herbal',
                'description' => 'Nabico Aerosol Herbal combina ingredientes naturales ideales para para disminuir la tensión muscular y estimular la recuperación y el descanso del cuerpo.
• Olor agradable que perdura.
• Efecto de frescura y descanso después de aplicado.
• Producto de uso tópico y venta libre.
• Registro Invima NSOC10330-21CO.
Además de CBD, su formula contiene:
ALCANFOR: Es un aceite natural utilizado para aliviar dolores musculares.
MENTOL: Es un alcohol secundario saturado que brinda una sensación de frescura cuando se aplica sobre la piel.
CALÉNDULA: Contribuye a regenerar la piel y producir colágeno. Es muy recomendable para tratar cicatrices.
ÁRNICA: Ayuda a reducir la hinchazón y disminuir el dolor.',
                'product_category_id' => 1,
                'images' => [
                    'herbal-250-ml',
                ],
                'slug' => Str::slug('Aerosol Herbal'),
                'featured' => false,
                'featured_description' => '',
                'purchase_price' => 19000.00,
                'sell_price' => 25000.00,
            ],
        ];

        // Inserta los productos en la base de datos
        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('Productos insertados correctamente.');
    }
}
