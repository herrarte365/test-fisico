<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Grupos extends Component
{
    public $gender, $age, $municipalitieId, $entrenadorId; 

    protected $rules = [
        'grade_id' => 'required|integer',
        'time_id' => 'required|integer'
    ];

    public function render()
    {
        return view('livewire.grupo.grupos');
    }
}
