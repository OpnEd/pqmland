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
        Schema::create('welcome_pages', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Tipo de sección: hero, features, testimonios, etc.
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable(); // Texto o HTML
            $table->string('image')->nullable();
            $table->json('buttons')->nullable(); // Botones
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_pages');
    }
};
