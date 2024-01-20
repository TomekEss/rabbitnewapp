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
        Schema::create('cages_eays', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_cages_name');
            $table->integer('eays_number');
            $table->date('cleaning_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cages_eays');
    }
};
