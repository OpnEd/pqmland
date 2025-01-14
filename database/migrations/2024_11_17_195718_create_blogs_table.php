<?php

use App\Models\BlogCategory;
use App\Models\User;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(BlogCategory::class)->constrained()->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('video')->nullable();
            $table->string('cover')->nullable();
            $table->json('ilustrations')->nullable();
            $table->json('tags')->nullable();
            $table->string('abstract');
            $table->string('introduction')->nullable();
            $table->json('objectives')->nullable();
            $table->longText('content');
            $table->json('conclusions')->nullable();
            $table->json('references')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
