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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['featured', 'featured_description', 'purchase_price', 'sale_price', 'tax']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('featured')->default(false);
            $table->string('featured_description')->nullable();
            $table->decimal('sale_price', 10, 2);
            $table->decimal('tax', 10,2);
        });
    }
};
