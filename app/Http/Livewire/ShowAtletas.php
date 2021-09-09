<?php

namespace App\Http\Livewire;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Group;
use App\Models\Parameter;
use App\Models\Physical_test;
use App\Models\Ps_detail;
use App\Models\Ps_tests_athlete;
use App\Models\Test_results;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

use function PHPUnit\Framework\isNull;

class ShowAtletas extends Component
{

    use WithPagination;

    public $puntajeGeneral = 0; 
    public $nivelGeneral = 0; 
    public $vista = 1;           # VARIABLE PARA DECIDIR QUE VISTA MOSTRAR
    public $atleta;              # VARIABLE QUE ALMACENA EL ATLETA SELECCIONADO
    public $NivelAtleta;
    public $grupos;              # ALMACENA EL LISTADO DE GRUPOS ASIGNADOS A UN ENTRENADOR
    public $yearAge;             # ALMACENA EL AÑO DEL GRUPO 
    public $edadActual = 0;
    public $estado = 100;
    public $prueba;              # VARIABLE QUE ALMACENA LA PRUEBA SELECCIONADA

    
    # VARIABLES PARA REGISTRAR NUEVO ATLETA
    public $firstName, $lastName, $gender, $birthdayDate, $establishment, $groupId, $age, $observations;
    
    public $showm=false;

    public $sort      = 'id';
    public $direction = 'desc';
    public $search = "";

    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'gender' => 'required|max:1',
        'birthdayDate' => 'required',
        'groupId' => 'required'
    ];


    public function render()
    {
        switch($this->vista)
        {
            #LISTADO DE ATLETAS.
            case 1: 
                
                $atletas = Athlete::whereIn('group_id', Coach::gruposAsignados(Coach::coacheID()))
                            ->orderBy($this->sort, $this->direction)
                            ->where('first_name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('id', 'LIKE', '%' . $this->search . '%')
                            ->paginate(8);

                            //$this->nivelAtleta = Test_results::where()

                return view('livewire.atleta.show-atletas', [
                    'atletas' => $atletas,
                    'paginas' => number_format($atletas->total()/8,0)
                ]);   

            break;

            #NUEVO ATLETA
            case 2: 
                
                $this->grupos = Group::where('coache_id', '=', Coach::coacheID())
                            ->where('age', '=', $this->yearAge)
                            ->where('gender', '=', $this->gender)
                            ->get();
                
                if($this->birthdayDate != null)
                {
                    $this->age      = $this->calcularEdad($this->birthdayDate, 'L');
                    $this->yearAge  = $this->calcularEdad($this->birthdayDate, 'Y');

                }

                return view('livewire.atleta.nuevo-atleta', [
                    'grupos' => $this->grupos
                ]);

            break;

            #PERFIL DE ATLETA
            case 3:
                
                $pruebas = Ps_tests_athlete::join('physical_tests', 'ps_tests_athletes.physical_test_id', '=', 'physical_tests.id')
                    ->select('ps_tests_athletes.*', 'physical_tests.description')
                    ->where('athlete_id', '=',  $this->atleta->id)->get();
                
                
                $this->edadActual = $this->calcularEdad($this->atleta->date_of_birth, 'Y');

                if($this->atleta->age == $this->edadActual){
                    $this->edadActual = $this->calcularEdad($this->atleta->date_of_birth, 'L');
                }else{
                    $this->actualizarAtleta();
                }


                return view('livewire.atleta.perfil-atleta', [
                    'pruebas'    => $pruebas,
                ]);
            break;

            #EDITAR ATLETA
            case 4:
                return view('livewire.atleta.editar-atleta');
            break;

            # VISUALIZAR PRUEBA UNITARIA DEL ATLETA. 
            case 5:

                $detalles = DB::table('physical_tests')
                    ->join('ps_tests_athletes', 'physical_tests.id', '=', 'ps_tests_athletes.physical_test_id')
                    ->join('ps_details', 'ps_tests_athletes.id', '=', 'ps_details.ps_test_athlete_id')
                    ->where('ps_tests_athletes.physical_test_id', '=', $this->prueba->physical_test_id)
                    ->where('ps_tests_athletes.athlete_id', '=', $this->atleta->id)
                    ->get();

                #$detalles = Ps_detail::where('physical_test_id', '=', $this->prueba->id)
                #                ->where('athlete_id', '=', $this->atleta->id)
                #                ->get();


                $resultadosFinales = Test_results::where('ps_test_athlete_id', '=', $this->prueba->id)->first();

                if($resultadosFinales != null){
                    $this->puntajeGeneral = $resultadosFinales->general_score;
                    $this->nivelGeneral = $resultadosFinales->general_level;
                }
            
                
                # $this->r_talla = $detalles[0]->result;
                # $this->n_talla = $this->r_talla;
                return view('livewire.atleta.aplicar-prueba', [
                    'detalles' => $detalles
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

    # 🙂 CALCULAR EDADES FORMATO LARGO Y CORTO
    public function calcularEdad($date, $formato)
    {

        
        $fechaNacimiento  = new DateTime($date);
        $fechaActual      = new DateTime(date("Y") . "-" . date("m") . "-" . date("d"));

        $intvl = $fechaNacimiento->diff($fechaActual);
        
        
        switch($formato)
        {
            case 'L':
                return $intvl->y . " Años, " . $intvl->m." Meses y ".$intvl->d." días"; 
            break;
            case 'Y':
                return $intvl->y;  
            break;
        };
    }

    # 🙂 CREAR UN NUEVO ATLETA
    public function save()
    {
        $this->validate(); 

        try{

            Athlete::create([
                'first_name'    => $this->firstName,
                'last_name'     => $this->lastName,
                'gender'        => $this->gender,
                'age'          => $this->yearAge,
                'date_of_birth' => $this->birthdayDate,
                'stablishment'  => $this->establishment,
                'status'        => 'A',
                'group_id'      => $this->groupId,
                'observations'  => $this->observations,
                'current_level' => 0,
            ]);

            $this->emit('alerta', 108);

        }catch(Exception $e){
            $this->emit('alerta', 106);
            dd($e);
        }

        $this->reset([
            'firstName', 
            'lastName', 
            'gender', 
            'yearAge', 
            'age', 
            'establishment', 
            'birthdayDate', 
            'groupId', 
            'vista',
            'observations'
        ]);
    }

    # 🙂 DETALLES DE UN ATLETA
    public function show(Athlete $atleta)
    {
        $this->atleta = $atleta;
        $this->vista = 3;
    }

    # 🙂 DETALLES PRUEBA FISICA DEL ATLETA. 
    public function showPrueba(Ps_tests_athlete $prueba)
    {
        $this->prueba = $prueba;
        $this->vista = 5;

    }

    # 🙂 CALCULADORA DE NIVELES
    public function calculadora($resultado, $prueba, $testId){

        $level = 0;
        $puntos = 0;
        $rLimpio = str_replace(array(":"), '', $resultado);             # LIMPIEZA DE LA CADENA
        
        $this->showm = is_numeric($rLimpio); 

        if($this->showm){
            $parametros = Parameter::where('test_id', '=', $testId)
                            ->where('age', '=', $this->atleta->age)
                            ->where('gender', '=', $this->atleta->gender)
                            ->get();
            


            foreach($parametros as $p){

                if($rLimpio >= $p->min && $rLimpio <= $p->max){
                    $level = $p->level;
                    $puntos = $p->points;
                }

            }

            try{

                DB::table('ps_details')
                    ->where('id', '=', $prueba)
                    ->update(
                        [
                            'result' => $resultado,
                            'level'  => $level,
                            'points' => $puntos,
                        ]
                    );

            }catch(Exception $e){

            }
        }else{
            $this->emit('alerta', 105);
        }
    }

    # 🙂 CALCULAR LOS RESULTADOS GENERALES
    public function resultados()
    {
        $generalLevel = 0;
        $generalResult =
            Ps_detail::where('ps_test_athlete_id', '=', $this->prueba->id)
                ->sum('points');

                $general_levels = DB::table('general_level')->get();

        foreach($general_levels as $gl){
            if($generalResult >= $gl->min && $generalResult <= $gl->max){
                $generalLevel = $gl->g_level;
            }
        }

        try{

            if(count(Test_results::where('ps_test_athlete_id', $this->prueba->id)->get())>0){

                try{

                    DB::beginTransaction();
                    
                    
                    DB::table('test_results')
                    ->where('ps_test_athlete_id', '=', $this->prueba->id)
                    ->update(
                        [
                            'general_score' => $generalResult,
                            'general_level' => $generalLevel,
                            ]
                        );
                    
                    $this->actualizarNivelAtleta($this->atleta->id, $generalLevel);
                    DB::commit();
                    $this->emit('alerta', 101);

                }catch(Exception $e){
                    DB::rollBack();
                    dd($e);
                }

            }else{

                try{

                    DB::beginTransaction();
                    
                    Test_results::create([
                        'general_score' => $generalResult,
                        'general_level' => $generalLevel,
                        'ps_test_athlete_id' => $this->prueba->id
                    ]);

                    $this->actualizarNivelAtleta($this->atleta->id, $generalLevel);
                    DB::commit();
                    $this->emit('alerta', 102);
                    
                }catch(Exception $e){
                    DB::rollBack();
                    dd($e);
                }
                
            }
            
        }catch(Exception $e){
            $this->emit('alerta', 103);
        }
        


    }

    # 🙂 ACTUALIZAR EL NIVEL DEL ATLETA EN LA TABLA DE ATLETAS. 
    public function actualizarNivelAtleta($idAtleta, $nivel){
        DB::table('athletes')
        ->where('id', '=', $idAtleta)
        ->update(
            [
                'current_level' => $nivel,
            ]
        );
    }

    # actualizar edad y grupo del Atleta
    public function actualizarAtleta()
    {

        $nuevaEdad = $this->calcularEdad($this->atleta->date_of_birth, 'Y');

        $grupoAnterior = Group::find($this->atleta->group_id);


        $grupo = Group::where('age', '=', $nuevaEdad)
            -> where('gender', '=', $this->atleta->gender)
            -> where('municipalitie_id', '=', $grupoAnterior->municipalitie_id)
            -> first();
        
        try{
            DB::table('athletes')
            ->where('id', '=', $this->atleta->id)
            ->update(
                [
                    'age'      => $nuevaEdad,
                    'group_id' => $grupo->id
                ]
            );

            $this->edadActual = $nuevaEdad;
            $this->emit('alerta', 107);

        }catch(Exception $e){
            $this->emit('alerta', 106);
        }

    }

}
