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
        Schema::table('rabbits_in_cages', function (Blueprint $table) {
            $table->unsignedBigInteger('cages_name_id');
            $table->foreign('cages_name_id')->references('id')->on('cages_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rabbits_in_cages', function (Blueprint $table) {
            $table->dropForeign(['cages_name_id']);
            $table->dropColumn('cages_name_id');
        });
    }
};
