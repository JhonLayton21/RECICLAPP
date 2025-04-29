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
        Schema::table('solicitud_recoleccions', function (Blueprint $table) {
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_recoleccions', function (Blueprint $table) {
            $table->dropColumn([
                'direccion',
                'localidad',
                'numero_contacto',
                'tipo_solicitud',
                'tipos_residuo',
                'frecuencia',
                'fecha_solicitud',
                'fecha_programada',
                'hora_preferida',
                'peso',
                'observaciones',
                'aceptacion_pautas',
                'estado'
            ]);
        });
    }
};
