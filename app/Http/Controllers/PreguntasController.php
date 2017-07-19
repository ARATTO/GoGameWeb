<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;


class PreguntasController extends Controller
{
    //
    public function consultaPregunta(Request $request){

    	$idpregunta = $request->idpregunta;
    	//$idpregunta = 1;

    	$consulta = "SELECT ID, PREGUNTA FROM pregunta WHERE ID = '" . $idpregunta . "';";
    	
    	$pregunta = DB::select(DB::raw($consulta));

    	$resultado = json_encode($pregunta);

    	//dd($resultado);

    	return $resultado;
    	

    }

    public function consultaRespuesta(Request $request){

    	$idpregunta = $request->idpregunta;

    	$consulta = "SELECT r.IDPREGUNTA, r.ALTERNATIVA, r.ESCORRECTA FROM respuesta r WHERE r.IDPREGUNTA = '" . $idpregunta . "';";

    	$respuesta = DB::select(DB::raw($consulta));

    	$resultado = json_encode($respuesta);

    	//dd($resultado);

    	return $resultado;

    }
}
