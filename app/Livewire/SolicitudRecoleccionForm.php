<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SolicitudRecoleccion;
use Illuminate\Support\Facades\Auth;

class SolicitudRecoleccionForm extends Component
{
    public $tipo_residuo;
    public $es_programada = false;
    public $fecha_solicitud;
    public $fecha_programada;
    public $turno;

    protected $rules = [
        'tipo_residuo' => 'required|in:Organico,Inorganico,Peligroso',
        'es_programada' => 'boolean',
        'fecha_solicitud' => 'required|date',
        'fecha_programada' => 'nullable|date|after_or_equal:fecha_solicitud',
        'turno' => 'required|integer|min:1|max:3'
    ];

    public function submit()
    {
        $this->validate();

        SolicitudRecoleccion::create([
            'usuario_id' => Auth::id(),
            'tipo_residuo' => $this->tipo_residuo,
            'fecha_solicitud' => $this->fecha_solicitud,
            'fecha_programada' => $this->es_programada ? $this->fecha_programada : null,
            'es_programada' => $this->es_programada,
            'estado' => 'Programada',
            'turno' => $this->turno
        ]);

        session()->flash('success', 'Solicitud de recolección enviada exitosamente.');
        $this->reset(); // Limpia los campos del formulario
    }


    public function render()
    {
        return view('livewire.solicitud-recoleccion-form');
    }
}
