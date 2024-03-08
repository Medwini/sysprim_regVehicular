<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS editarVehiculo;');
        DB::unprepared(
            'CREATE PROCEDURE editarVehiculo()
            BEGIN 
                SELECT * FROM vehiculos_m_s;
            END;'
            );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos_stored_procedures');
    }
};
