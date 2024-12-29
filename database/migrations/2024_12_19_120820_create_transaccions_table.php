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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_pedido_id')->constrained('guest_pedidos')->cascadeOnDelete();
            $table->string('transaccion_id')->unique();
            $table->decimal('monto', 10, 2);
            $table->string('estado');
            $table->json('datos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};
