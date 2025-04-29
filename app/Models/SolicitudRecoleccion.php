<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolicitudRecoleccion extends Model
{
    protected $fillable = [
        'usuario_id', 'tipo_residuo', 'fecha_solicitud',
        'fecha_programada', 'es_programada', 'estado', 'turno'
    ];

    protected $casts = [
        'fecha_solicitud' => 'datetime',
        'fecha_programada' => 'datetime',
        'es_programada' => 'boolean'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
