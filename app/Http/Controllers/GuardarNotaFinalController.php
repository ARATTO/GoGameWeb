<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CuestionarioAsignado;

class GuardarNotaFinalController extends Controller
{
    /*
        Metodo que guarda en la base de datos 
        la nota que se obtuvo al realizarse un 
        cuestionario en el cliente.
    */

    public function guardarNota(Request $request){

    	//Crea un objeto de tipo CuestionarioAsignado
    	$cuestionarioAsignado = new CuestionarioAsignado;

    	//Recibe parametros del cliente
    	$cuestionarioAsignado->IDPERFIL = $request->idperfil;
    	$cuestionarioAsignado->IDCUESTIONARIO = $request->idcuestionario;
    	$cuestionarioAsignado->NOTAFINAL = $request->notafinal;

    	//Guarda en la base de datos el resultado
    	$cuestionarioAsignado->save();

        //FINAL DEL PROYECTO

    }
}
