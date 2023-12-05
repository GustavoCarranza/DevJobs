<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    protected $listeners = ['mostrarAlerta'];

    public function mostrarAlerta(Vacante $vacante)
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate();

        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
