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
         Schema::create('solicitud_recoleccions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');

            // Nuevos campos
            $table->string('direccion');
            $table->string('localidad');
            $table->string('numero_contacto');
            $table->enum('tipo_solicitud', ['Programada', 'Bajo demanda']);
            $table->json('tipos_residuo'); // selección múltiple
            $table->string('frecuencia')->nullable(); // 1 vez por semana, etc.
            $table->date('fecha_solicitud');
            $table->date('fecha_programada')->nullable();
            $table->string('hora_preferida')->nullable(); // ej. 08:00 - 10:00
            $table->float('peso')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('aceptacion_pautas')->default(false);

            // Campos técnicos
            $table->string('estado')->default('Pendiente');
            $table->integer('numero_turno')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_recoleccions');
    }
};
