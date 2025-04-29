<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolicitudRecoleccion extends Model
{
    protected $fillable = [
        'usuario_id', 'direccion', 'localidad', 'numero_contacto',
        'tipo_solicitud', 'tipos_residuo', 'frecuencia', 'fecha_solicitud',
        'fecha_programada', 'hora_preferida', 'peso', 'observaciones',
        'aceptacion_pautas', 'estado', 'numero_turno'
    ];

    protected $casts = [
        'fecha_solicitud' => 'date',
        'fecha_programada' => 'date',
        'tipos_residuo' => 'array',
        'aceptacion_pautas' => 'boolean'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
