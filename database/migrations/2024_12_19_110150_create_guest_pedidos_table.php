<?php

use App\Models\Guest;
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
        Schema::create('guest_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Guest::class)->constrained()->cascadeOnDelete();
            $table->decimal('total', 10, 2);
            $table->enum('estado', ['En proceso', 'Pagado - No enviado', 'Enviado - No pagado', 'Enviado - Pagado', 'Entregado', 'Finalizado'])->default('En proceso');
            $table->string('transaccion_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_pedidos');
    }
};
