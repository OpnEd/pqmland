<?php

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
        Schema::table('blogs', function (Blueprint $table) {
            $table->json('ilustrations')->after('objectives')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            Schema::dropIfExists('blogs');
        });
    }
};

/* php artisan make:migration adds_tax_to_products_table --table=products */
/* php artisan migrate:rollback --step=1 // para revertir una migración singular */
