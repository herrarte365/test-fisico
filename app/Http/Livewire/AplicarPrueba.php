<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use Livewire\Component;

class AplicarPrueba extends Component
{

    public $atleta;

    public function mount(Athlete $atleta)
    {
        $this->atleta = $atleta;
    }

    public function render()
    {
        return view('livewire.prueba.aplicar-prueba');
    }
}
