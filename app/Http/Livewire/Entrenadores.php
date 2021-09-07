<?php

namespace App\Http\Livewire;

use App\Models\Coach;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Entrenadores extends Component
{

    public function render()
    {
        return view('livewire.entrenador.entrenadores');
    }

}
