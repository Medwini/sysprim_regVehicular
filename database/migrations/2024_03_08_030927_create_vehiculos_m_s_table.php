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
        Schema::create('vehiculos_m_s', function (Blueprint $table) {
            $table->id();
            $table->string("placa");
            $table->integer("anio");
            $table->string("color");
            $table->string("fecha_ing");
            $table->integer("marca");
            $table->integer("modelo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos_m_s');
    }
};
