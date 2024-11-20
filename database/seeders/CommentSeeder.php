<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtiene todos los blogs existentes
        $blogs = Blog::all();

        // Itera sobre cada blog
        foreach ($blogs as $blog) {
            // Genera un número aleatorio de comentarios entre 0 y 10
            $numComments = rand(0, 10);

            for ($i = 0; $i < $numComments; $i++) {
                // Selecciona un usuario aleatorio
                $user = User::inRandomOrder()->first();

                // Crea un comentario
                Comment::create([
                    'user_id' => $user->id,
                    'blog_id' => $blog->id,
                    'content' => Str::random(100), // Genera contenido aleatorio
                    'url' => rand(0, 1) ? 'https://example.com/' . Str::random(10) : null, // Genera URL aleatoria o deja null
                    'created_at' => now()->subDays(rand(0, 30)), // Fecha aleatoria en el último mes
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

/*

Aquí tienes un seeder para generar entre 0 y 10 comentarios aleatorios para cada uno de los registros en la tabla `blogs`. Este seeder utiliza la clase `Comment` que asumo que ya tienes en tu proyecto, junto con `User` y `Blog`. Si no, asegúrate de crear un modelo `Comment` si aún no existe.

### Explicación del Código

- **`Blog::all()`**: Obtiene todos los registros de la tabla `blogs`.
- **`rand(0, 10)`**: Genera un número aleatorio de comentarios entre 0 y 10.
- **`User::inRandomOrder()->first()`**: Selecciona un `User` aleatorio para asociar como autor del comentario.
- **`Str::random(100)`**: Genera una cadena aleatoria de 100 caracteres para el contenido del comentario.
- **`rand(0, 1) ? 'https://example.com/' . Str::random(10) : null`**: Aleatoriamente asigna una URL o deja el campo como `null`.
- **`now()->subDays(rand(0, 30))`**: Genera una fecha de creación aleatoria en los últimos 30 días.

### Pasos para Ejecutar el Seeder

1. Asegúrate de que tienes el modelo `Comment` y que las relaciones con `User` y `Blog` están correctamente definidas.
2. Registra el seeder en `DatabaseSeeder`:

   ```php
   public function run()
   {
       $this->call(CommentSeeder::class);
   }
   ```

3. Ejecuta el seeder con el comando:

   ```bash
   php artisan db:seed --class=CommentSeeder
   ```

Esto generará comentarios aleatorios para cada `Blog`, variando de 0 a 10 por cada entrada.

*/
