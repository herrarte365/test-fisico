<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Department;
use App\Models\Group;
use App\Models\Municipality;
use App\Models\Physical_test;
use App\Models\Ps_detail;
use App\Models\Ps_tests_athlete;
use App\Models\Ps_tests_athletes;
use App\Models\Test;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowGrupos extends Component
{

    use WithPagination;


    public $vista = 1; 
    public $name, $gender, $age, $municipalityId, $coacheId;
    public $departamento = 0;
    public $grupo;
    public $open = false;
    
    public $sort      = 'id';
    public $direction = 'desc';
    public $search = "";

    protected $rules = [
        'name' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'municipalityId' => 'required',
    ];

    public function render()
    {
        switch($this->vista)
        {
            case 1: 

                $grupos = Group::where('coache_id', '=', Coach::coacheID(Auth::id()))
                    ->orderBy($this->sort, $this->direction)
                    ->where('gender', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('age', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                    ->paginate(8);

                return view('livewire.grupo.show-grupos', [
                    'grupos' => $grupos,
                    'paginas' => number_format($grupos->total()/8,0)
                ]);

            break;
            case 2: 
                $departamentos = Department::all();
                $municipios = Municipality::where('department_id', '=', $this->departamento)->get();

                return view('livewire.grupo.nuevo-grupo', [
                    'departamentos' => $departamentos,
                    'municipios' => $municipios
                ]);

            break;
            case 3:

                $this->show($this->grupo->id);
                $atletas = Athlete::where('group_id', '=', $this->grupo->id)->get();
                return view('livewire.grupo.perfil-grupo', [
                    'atletas' => $atletas
                ]);

            break;
            case 4:
                return view('livewire.grupo.editar-grupo');
            break;
            case 5:

                $atletas = Athlete::where('group_id', '=', $this->grupo->id)->get();

                return view('livewire.grupo.aplicar-prueba', [
                    'atletas' => $atletas
                ]);
                
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

    #CREAR UN NUEVO GRUPO
    public function save()
    {
        $this->validate(); 

        try{


            Group::create([
                'name' => $this->name,
                'gender' => $this->gender,
                'age' => $this->age,
                'municipalitie_id' => $this->municipalityId,
                'coache_id' => Coach::coacheID(Auth::id())
            ]);


        }catch(Exception $e){
            dd($e);
        }

        $this->reset(['name', 'gender', 'age', 'municipalityId']);
        $this->vista = 1;
    }

    #DETALLES DE UN GRUPO
    public function show($id)
    {
        $this->grupo = Group::where('coache_id', '=', Coach::coacheID(Auth::id()))
                                ->join('municipalities', 'groups.municipalitie_id', '=', 'municipalities.id')
                                ->join('departments', 'municipalities.department_id', '=', 'departments.id')
                                ->join('coaches', 'groups.coache_id', '=', 'coaches.id')
                                ->select(
                                    'groups.*', 
                                    'municipalities.name_municipality', 
                                    'departments.name_department', 
                                    'coaches.first_name',
                                    'coaches.last_name'
                                )
                                ->where('groups.id', $id)
                                ->first();

        $this->vista = 3;
    }

    #ASIGNAR NUEVA PRUEBA FISICA
    public function nuevaPrueba($atletas)
    {
        try{

            DB::beginTransaction();

            $tests = Test::select('id')->get();

            $prueba = Physical_test::create([
                'description' => 'PRUEBA - ' . date("d") . '-' . date('m') . '-' . date("Y"),
                'group_id' => $this->grupo->id
            ]);
            
            foreach($atletas as $atleta){
                
                $pruebaAtleta = Ps_tests_athlete::create([
                    'physical_test_id' => $prueba->id,
                    'athlete_id'       => $atleta['id']
                ]);
                
                foreach($tests as $testId){
                    
                    Ps_detail::create([
                        'result'             => 0,
                        'level'              => 0,
                        'points'             => 0,
                        'ps_test_athlete_id' => $pruebaAtleta->id, 
                        'test_id'            => $testId->id,
                    ]);
                }
                
            }
            
            DB::commit();
            
            $this->open = false;
                        
        }catch(Exception $e){
            DB::rollBack();

        }
    }

}
