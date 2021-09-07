<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Atletas extends Component
{
    public $firstName, $lastName, $gender, $age, $stablishment, $date, $groupId; 

    protected $rules = [
        'grade_id' => 'required|integer',
        'time_id' => 'required|integer'
    ];

    public function render()
    {
        return view('livewire.atleta.atletas');
    }
}
