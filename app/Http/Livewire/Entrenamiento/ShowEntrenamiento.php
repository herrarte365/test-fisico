<?php

namespace App\Http\Livewire\Entrenamiento;

use App\Models\Coach;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEntrenamiento extends Component
{
    use WithPagination;

    public $vista = 1; 
    public $email, $password, $firstName, $lastName, $numberPhone; 
    public $entrenador; 

    public $sort      = 'id';
    public $direction = 'desc';
    public $search = "";

    public function render()
    {
        switch($this->vista)
        {
            case 1:

                $entrenamientos = DB::table('physical_workouts')->where('coaches_id', '=', Coach::coacheID());

                return view('livewire.entrenamiento.show-entrenamiento', [
                    'entrenamientos' => $entrenamientos
                ]);
            break;
        }
    }
}
 