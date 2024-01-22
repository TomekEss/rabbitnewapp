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
            $table->unsignedInteger('rabbit_id');
            $table->foreign('rabbit_id')->references('id')->on('rabbits');
            $table->unsignedInteger('cage_eye');
            $table->foreign('cage_eye')->references('id')->on('cages_eyes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cage', function (Blueprint $table) {
            $table->dropForeign(['rabbit_id']);
            $table->dropColumn('rabbit_id');

            $table->dropForeign(['cage_eye']);
            $table->dropColumn('cage_eye');
        });
    }
};
