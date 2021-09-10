<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\DB;
use PDF;

class pdfController extends Controller
{
    # el parametro id es del test id. 
    public function reportePruebaGrupoPDF($id)
    {
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
            ->where('ps_tests_athletes.physical_test_id', '=', $id)
            ->get();
        
        $encabezado = DB::table('physical_tests')
            ->join('groups', 'physical_tests.group_id', '=', 'groups.id')
            ->join('municipalities', 'groups.municipalitie_id', '=', 'municipalities.id')
            ->join('departments', 'municipalities.department_id', '=', 'departments.id')
            ->join('coaches', 'groups.coache_id', '=', 'coaches.id')
            ->where('physical_tests.id', '=', $id)
            ->select(
                'physical_tests.description', 
                'groups.name', 
                'groups.gender',
                'groups.age',
                'municipalities.name_municipality',
                'departments.name_department',
                'coaches.first_name',
                'coaches.last_name'
            )
            ->first();
        
        $resultados = DB::table('ps_details') 
            ->join('ps_tests_athletes', 'ps_details.ps_test_athlete_id', '=', 'ps_tests_athletes.id')
            ->where('ps_tests_athletes.physical_test_id', '=', $id)
            ->orderBy('ps_tests_athletes.athlete_id', 'asc')
            ->orderBy('ps_details.test_id', 'asc')
            ->get();


		$pdf = PDF::loadView('reportes.repGenPrueba', [
            'atletas' => $atletas,
            'resultados' => $resultados,
            'encabezado' => $encabezado
        ]);

        $pdf->setPaper('A4', 'landscape');
		# return $pdf->download('prueba.pdf');
        return $pdf->stream();
    }

    # el id es el id del test del atleta
    public function reportePruebaAtletaPDF($id)
    {
        $atleta = DB::table('ps_tests_athletes')
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
            ->where('ps_tests_athletes.physical_test_id', '=', $id)
            ->first();
            
        
        $encabezado = DB::table('physical_tests')
            ->join('groups', 'physical_tests.group_id', '=', 'groups.id')
            ->join('municipalities', 'groups.municipalitie_id', '=', 'municipalities.id')
            ->join('departments', 'municipalities.department_id', '=', 'departments.id')
            ->join('coaches', 'groups.coache_id', '=', 'coaches.id')
            ->where('physical_tests.id', '=', $id)
            ->select(
                'physical_tests.description', 
                'groups.name', 
                'groups.gender',
                'groups.age',
                'municipalities.name_municipality',
                'departments.name_department',
                'coaches.first_name',
                'coaches.last_name'
            )
            ->first();
        
        $detalles = DB::table('physical_tests')
            ->join('ps_tests_athletes', 'physical_tests.id', '=', 'ps_tests_athletes.physical_test_id')
            ->join('ps_details', 'ps_tests_athletes.id', '=', 'ps_details.ps_test_athlete_id')
            ->select('ps_details.*')
            ->where('ps_tests_athletes.physical_test_id', '=', $id)
            ->where('ps_tests_athletes.athlete_id', '=', $atleta->id)
            ->get();
        
        $pruebas = Test::all();

		$pdf = PDF::loadView('reportes.repPruebaAtleta', [
            'atleta' => $atleta,
            'encabezado' => $encabezado,
            'detalles' => $detalles,
            'pruebas' => $pruebas
        ]);

        $pdf->setPaper('letter');
        ob_end_clean();
		# return $pdf->download('prueba.pdf');
        return $pdf->stream();



    }

}
