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
        Schema::table('rabbits', function (Blueprint $table) {
            $table->string('updated_at')->nullable();
            $table->string('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rabbits', function (Blueprint $table) {
            $table->dropColumn('updated_at'); // Dodaj tę linię
            $table->dropColumn('updated_at'); // Dodaj tę linię
        });
    }
};
