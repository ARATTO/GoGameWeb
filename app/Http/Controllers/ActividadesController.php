<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ActividadesController extends Controller
{
    public function store(Request $request)
    {
    	$idmateria=$request->Materia;
    	$idgrupo=$request->Grupo;
    	$cadena1="select actividad.nombreactividad,detallepunto.puntosactividad from detallepunto inner join actividad on actividad.iddetallepunto=detallepunto.id inner join grupo on actividad.idgrupo=grupo.id inner join materiaimpartida on materiaimpartida.id=detallepunto.idmateriaimpartida inner join materia on materiaimpartida.idmateria=materia.id ";
        $cadena2=" where materia.id=".$idmateria." and grupo.id=".$idgrupo.";";
        $resultado=$cadena1.$cadena2;
        //dd($resultado);
        $actividades = DB::select(DB::raw($resultado));
        //dd($actividades);
        $recorrido = json_encode($actividades);
        
        

        return $recorrido;
    	        
    }
}
