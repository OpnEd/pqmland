<?php

use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignIdFor(ProductCategory::class)->constrained()->onDelete('cascade');
            $table->json('images');
            $table->string('slug')->unique();
            $table->boolean('featured')->default(false);
            $table->string('featured_description')->nullable();
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};


/*

// Cambiar columnas
php artisan make:migration update_columns_in_table_name --table=table_name

class UpdateColumnsInTableName extends Migration
{
    public function up()
    {
        Schema::table('table_name', function (Blueprint $table) {
            $table->string('column_name', 150)->nullable()->change(); // Cambia el tamaño y lo hace opcional
        });
    }

    public function down()
    {
        Schema::table('table_name', function (Blueprint $table) {
            $table->string('column_name', 255)->nullable(false)->change(); // Revertir al estado anterior
        });
    }
}

// Eliminar columnas

php artisan make:migration remove_columns_from_table_name --table=table_name

class RemoveColumnsFromTableName extends Migration
{
    public function up()
    {
        Schema::table('table_name', function (Blueprint $table) {
            $table->dropColumn(['column_name1', 'column_name2']); // Lista de columnas a eliminar
        });
    }

    public function down()
    {
        Schema::table('table_name', function (Blueprint $table) {
            $table->string('column_name1'); // Recrear la columna en caso de revertir
            $table->integer('column_name2'); // Ajusta el tipo según sea necesario
        });
    }
}

*/
