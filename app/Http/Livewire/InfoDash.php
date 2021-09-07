<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Physical_test;
use Livewire\Component;

class InfoDash extends Component
{
    public function render()
    {

        $atletas = Athlete::count();
        $pruebas = Physical_test::count();
        $entrenadores = Coach::count();

        return view('livewire.info-dash', [
            'atletas'      => $atletas,
            'pruebas'      => $pruebas,
            'entrenadores' => $entrenadores
        ]);
    }
}
