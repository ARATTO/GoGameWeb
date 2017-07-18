<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class CuestionariosController extends Controller
{
    public function store(Request $request)
    {
    	$idmateria=$request->Materia;
    	$idgrupo=$request->Grupo;
    	$cadena1="select cuestionario.nombrecuestionario,cuestionario.duracioncuestionario from cuestionariomateria inner join cuestionario on cuestionariomateria.idcuestionario=cuestionario.id inner join grupo on cuestionariomateria.idmateriaimpartida=grupo.idmateriaimpartida inner join materiaimpartida inner join materia on materiaimpartida.idmateria=materia.id";
        $cadena2=" where materia.id=".$idmateria." and grupo.id=".$idgrupo.";";
        $resultado=$cadena1.$cadena2;
        //dd($resultado);
        $cuestionarios = DB::select(DB::raw($resultado));
        //dd($cuestionarios);
        $recorrido = json_encode($cuestionarios);
        

        return $recorrido;
    	        
    }
}
