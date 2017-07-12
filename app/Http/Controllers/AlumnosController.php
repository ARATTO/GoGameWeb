<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;

class AlumnosController extends Controller
{
    public function store(Request $request)
    {
    	$idmateria=$request->Materia;
    	$idgrupo=$request->Grupo;
    	$cadena1="select estudiante.nombreestudiante,estudiante.carnetestudiante,perfil.imagenperfil 
    	from estudiante inner join perfil on perfil.idestudiante=estudiante.id inner join inscripcion on estudiante.id=inscripcion.IDESTUDIANTE 
    	inner join grupo on inscripcion.IDGRUPO=grupo.id inner join materiaimpartida 
    	on materiaimpartida.id= grupo.IDMATERIAIMPARTIDA inner join materia on 
    	materiaimpartida.IDMATERIA=materia.id";
        $cadena2=" where materia.id=".$idmateria." AND grupo.id =".$idgrupo.";";
        $resultado=$cadena1.$cadena2;
        //dd($resultado);
        $alumnos = DB::select(DB::raw($resultado));

        //dd($alumnos);
        $conver = json_encode($alumnos);
        //dd($conver);

        $recorrido = json_decode($conver);
        //dd($recorrido);
        /*foreach($recorrido as $r){
            
            try{
                $r->imagenperfil=base64_encode( file_get_contents(public_path()."/gogame/FotoPerfil/".$r->imagenperfil));
                
            }catch(Exception $e) {
                error_log('NO HAY ALUMNOS');
            }
        }*/
        $final = json_encode($recorrido);
        return $final;
    }
}
