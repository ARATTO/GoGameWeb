<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class MedallasController extends Controller
{
   public function store(Request $request)
    {
    	$idmateria=$request->Materia;
    	$idgrupo=$request->Grupo;
    	$cadena1="select medalla.nombremedalla,medalla.imagenmedalla,medalla.id from detallemedalla inner join materiaimpartida on detallemedalla.idmateriaimpartida=materiaimpartida.id inner join materia on materiaimpartida.id=materia.id inner join medalla on detallemedalla.IDMEDALLA=medalla.id";
        $cadena2=" where materia.id=".$idmateria.";";
        $resultado=$cadena1.$cadena2;
        //dd($resultado);
        $medallas = DB::select(DB::raw($resultado));
        //dd($medallas);
        $conver = json_encode($medallas);
        //dd($conver);

        $recorrido = json_decode($conver);
        //dd($recorrido);
        foreach($recorrido as $r){
            
            try{
                $r->imagenmedalla=base64_encode( file_get_contents(public_path()."/gogame/FotoMedalla/".$r->imagenmedalla));
               
            }catch(Exception $e) {
                error_log('NO HAY MEDALLAS');
            }
        }

        $final = json_encode($recorrido);
        
        return $final;  

    	         
    }

    
}
