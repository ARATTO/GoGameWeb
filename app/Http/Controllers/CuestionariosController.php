<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use DB;

class CuestionariosController extends Controller
{
    public function store(Request $request)
    {
        $fechaactual=Carbon::now();
    	$idmateria=$request->Materia;
    	$idgrupo=$request->Grupo;
    	$cadena1="select cuestionario.nombrecuestionario,cuestionario.duracioncuestionario,cuestionario.id from cuestionariomateria inner join cuestionario on cuestionariomateria.idcuestionario=cuestionario.id inner join grupo on cuestionariomateria.idmateriaimpartida=grupo.idmateriaimpartida inner join materiaimpartida inner join materia on materiaimpartida.idmateria=materia.id";
        $cadena2=" where materia.id=".$idmateria." and grupo.id=".$idgrupo." and fechainiciocuestionario<'".$fechaactual."' and fechafincuestionario>'".$fechaactual."';";
        $resultado=$cadena1.$cadena2;
        //dd($resultado);
        $cuestionarios = DB::select(DB::raw($resultado));
        //dd($cuestionarios);
        $recorrido = json_encode($cuestionarios);
        

        return $recorrido;
    	        
    }
}
