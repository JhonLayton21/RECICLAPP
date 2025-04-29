<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SolicitudRecoleccion;
use Illuminate\Support\Facades\Auth;

class SolicitudRecoleccionForm extends Component
{
    public $direccion, $localidad, $numero_contacto;
    public $tipo_solicitud = 'Programada';
    public $tipos_residuo = [];
    public $frecuencia, $fecha_solicitud, $fecha_programada, $hora_preferida;
    public $peso, $observaciones;
    public $aceptacion_pautas = false;

    protected $rules = [
        'direccion' => 'required|string|max:255',
        'localidad' => 'required|string|max:255',
        'numero_contacto' => 'required|string|max:20',
        'tipo_solicitud' => 'required|in:Programada,Bajo demanda',
        'tipos_residuo' => 'required|array|min:1',
        'frecuencia' => 'nullable|string',
        'fecha_solicitud' => 'required|date',
        'fecha_programada' => 'nullable|date|after_or_equal:fecha_solicitud',
        'hora_preferida' => 'nullable|string',
        'peso' => 'nullable|numeric|min:0',
        'observaciones' => 'nullable|string',
        'aceptacion_pautas' => 'accepted'
    ];

    public function submit()
    {
        $this->validate();

        SolicitudRecoleccion::create([
            'usuario_id' => Auth::id(),
            'direccion' => $this->direccion,
            'localidad' => $this->localidad,
            'numero_contacto' => $this->numero_contacto,
            'tipo_solicitud' => $this->tipo_solicitud,
            'tipos_residuo' => $this->tipos_residuo,
            'frecuencia' => $this->frecuencia,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_programada' => $this->tipo_solicitud === 'Programada' ? $this->fecha_programada : null,
            'hora_preferida' => $this->hora_preferida,
            'peso' => $this->peso,
            'observaciones' => $this->observaciones,
            'aceptacion_pautas' => $this->aceptacion_pautas,
            'estado' => 'Pendiente'
        ]);

        session()->flash('success', 'Solicitud registrada correctamente.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.solicitud-recoleccion-form');
    }
}
