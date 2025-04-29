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
            $table->string('tipo_residuo');
            $table->dateTime('fecha_solicitud');
            $table->dateTime('fecha_programada')->nullable();
            $table->boolean('es_programada')->default(false);
            $table->string('estado')->default('Pendiente');
            $table->string('turno')->nullable(); // Mañana, Tarde, etc.
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
