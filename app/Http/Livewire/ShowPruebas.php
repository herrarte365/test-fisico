<?php

namespace App\Http\Livewire;

use App\Models\Coach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPruebas extends Component
{

    use WithPagination;

    public $sort      = 'id';
    public $direction = 'desc';
    public $search = "";

    public $vista = 1; 
    public $test;


    public function render()
    {
        switch($this->vista)
        {
            case 1: 

                $pruebas = DB::table('physical_tests')
                                ->join('groups', 'physical_tests.group_id', '=', 'groups.id')
                                ->select('physical_tests.*', 'groups.name', 'groups.gender', 'groups.age')
                                ->orderBy('physical_tests.'.$this->sort, $this->direction)
                                ->where('groups.coache_id', '=', Coach::coacheID(Auth::id()))
                                ->where('groups.gender', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('groups.age', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('physical_tests.description', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('physical_tests.id', 'LIKE', '%' . $this->search . '%')
                                ->paginate(8);

                return view('livewire.prueba.show-pruebas', [
                    'pruebas' => $pruebas,
                    'paginas' => number_format($pruebas->total()/8,0)
                ]);

            break;

            case 2:
                
                $atletas = DB::table('ps_tests_athletes')
                    ->join('athletes', 'ps_tests_athletes.athlete_id', '=', 'athletes.id')
                    ->leftJoin('test_results', 'ps_tests_athletes.id', '=', 'test_results.ps_test_athlete_id')
                    ->select(
                        'athletes.id',
                        'athletes.first_name',
                        'athletes.last_name',
                        'test_results.general_score',
                        'test_results.general_level',
                        'ps_tests_athletes.physical_test_id'
                    )
                    ->where('ps_tests_athletes.physical_test_id', '=', $this->test[0]->id)
                    ->get();

                $resultados = DB::table('ps_details') 
                    ->join('ps_tests_athletes', 'ps_details.ps_test_athlete_id', '=', 'ps_tests_athletes.id')
                    ->where('ps_tests_athletes.physical_test_id', '=', $this->test[0]->id)
                    ->orderBy('ps_tests_athletes.athlete_id', 'asc')
                    ->orderBy('ps_details.test_id', 'asc')
                    ->get();
 
                
                return view('livewire.prueba.perfil-prueba', [
                    'atletas' => $atletas,
                    'resultados' => $resultados
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


    public function showTest($testId){

        $this->test = DB::table('physical_tests')
            ->join('groups', 'physical_tests.group_id', '=', 'groups.id')
            ->select('physical_tests.*', 'groups.name', 'groups.gender', 'groups.age')
            ->where('groups.coache_id', '=', Coach::coacheID(Auth::id()))
            ->where('physical_tests.id', '=', $testId)
            ->get();

        $this->vista = 2;
        
    }

}
