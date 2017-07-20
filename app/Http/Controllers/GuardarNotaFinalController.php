<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CuestionarioAsignado;

class GuardarNotaFinalController extends Controller
{
    //
    public function guardarNota(Request $request){

    	$cuestionarioAsignado = new CuestionarioAsignado;
    	$cuestionarioAsignado->IDPERFIL = $request->idperfil;
    	$cuestionarioAsignado->IDCUESTIONARIO = $request->idcuestionario;
    	$cuestionarioAsignado->NOTAFINAL = $request->notafinal;
    	$cuestionarioAsignado->save();

    }
}
