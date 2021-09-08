<?php

namespace App\Http\Livewire;

use App\Models\Coach;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;


class ShowEntrenadores extends Component
{

    use WithPagination;

    public $vista = 1; 
    public $email, $password, $firstName, $lastName, $numberPhone; 
    public $entrenador; 

    public $sort      = 'id';
    public $direction = 'desc';
    public $search = "";

    protected $rules = [
        'email' => 'required',
        'password' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
    ];
 
    public function render()
    {
        switch($this->vista)
        {
            case 1: 

                $entrenadores = Coach::orderBy($this->sort, $this->direction)
                    ->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('user_id', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('id', 'LIKE', '%' . $this->search . '%')
                    ->paginate();

                return view('livewire.entrenador.show-entrenadores', [
                    'entrenadores' => $entrenadores                    
                ]);

            break;
            case 2: 
                return view('livewire.entrenador.nuevo-entrenador');
            break;
            case 3:
                return view('livewire.entrenador.perfil-entrenador');
            break;
            case 4:
                return view('livewire.entrenador.editar-entrenador');
            break;
        }
    }

    public function order($sort)
    {   
        if($this->sort == $sort){            
            $this->direction = $this->direction == 'asc' ? 'desc' : 'asc';            
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #CREAR UN NUEVO ENTRENADOR
    public function save()
    {

        $this->validate(); 

        try{

            DB::beginTransaction();

            $user = User::create([
                'name' => $this->firstName . ' ' . $this->lastName,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role_id' => 2
            ]);

            Coach::create([
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'number_phone' => $this->numberPhone,
                'user_id' => $user->id
            ]);

            DB::commit();

        }catch(Exception $e){

            DB::rollBack();
        }

        $this->reset(['email', 'password', 'firstName', 'lastName', 'numberPhone']);
        $this->vista = 1;
    }

    #DETALLES DE UN ENTRENADOR
    public function show(Coach $entrenador)
    {
        $this->entrenador = $entrenador;
        $this->vista = 3;
    }
}
