<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;


class PreguntasController extends Controller
{
    /*
        Metodo que consulta en la base de datos 
        la pregunta segun el id que recibe del 
        cliente.
    */

    public function consultaPregunta(Request $request){

        //Recibe parametros del cliente
    	$idpregunta = $request->idpregunta;
    	
        //Consulta a la base de datos
    	$consulta = "SELECT ID, PREGUNTA FROM pregunta WHERE ID = '" . $idpregunta . "';";
    	$pregunta = DB::select(DB::raw($consulta));

        //Convierte el resultado de la consulta a formato json
    	$resultado = json_encode($pregunta);

    	return $resultado;
    	
    }

    /*
        Metodo que consulta en la base de datos 
        las respuestas segun el idpregunta que 
        recibe del cliente.
    */

    public function consultaRespuesta(Request $request){

        //Recibe parametros del cliente
    	$idpregunta = $request->idpregunta;

        //Consulta a la base de datos
    	$consulta = "SELECT r.IDPREGUNTA, r.ALTERNATIVA, r.ESCORRECTA FROM respuesta r WHERE r.IDPREGUNTA = '" . $idpregunta . "';";
    	$respuesta = DB::select(DB::raw($consulta));

        //Convierte el resultado de la consulta a formato json
    	$resultado = json_encode($respuesta);

    	return $resultado;

    }
}
