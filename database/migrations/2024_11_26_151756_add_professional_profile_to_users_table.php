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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->text('professional_profile')->nullable()->after('degree');
            $table->string('current_position')->nullable()->after('professional_profile');
            $table->string('city')->nullable()->after('current_position');
            $table->string('phone_number')->nullable()->after('city');
            $table->string('url')->nullable()->after('phone_number');
            $table->string('linked_in')->nullable()->after('url');
            $table->string('facebook')->nullable()->after('linked_in');
            $table->string('tweeter')->nullable()->after('facebook');
            $table->string('instagram')->nullable()->after('tweeter');
            $table->date('birth_date')->nullable()->after('instagram');
            $table->boolean('cv_published')->default(false)->after('birth_date');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
