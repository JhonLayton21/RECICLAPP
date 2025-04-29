<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SolicitudRecoleccion;

class Informes extends Component
{
    public $solicitudes;

    public function mount()
    {
        // Cargar todas las solicitudes con información del usuario asociado
        $this->solicitudes = SolicitudRecoleccion::with('usuario')->latest()->get();
    }

    public function render()
    {
        return view('livewire.informes');
    }
}
