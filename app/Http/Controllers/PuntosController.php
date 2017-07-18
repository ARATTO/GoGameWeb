<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Actividad;
use App\DetallePunto;
use App\DetallePuntoActividad;
use App\MedallaGanada;
use DB;


class PuntosController extends Controller
{

	/*metodo que asigna puntos a un perfil y medallas*/
    public function asignarPuntos(){
		$variableRequestActividad =-1;
		$variableRequestidGrupo = 1;
		//elias_barrera@hotmail.com

    	$correo = "elias_barrera@hotmail.com";
    	$idActividad =0;


    	//comprueba si es por asistencia la actividad
    	if($variableRequestActividad == -1){
    		$a = DB::select("select ID from actividad where
    			nombreactividad like '%asistencia%' and 
    			idgrupo = $variableRequestidGrupo");

    		if(count($a)>0){
    			$idActividad = $a[0]->ID;	
    		}else{
    			return "no existe actividad de asistencia";
    		}

    		

    		
    	}elseif ($variableRequestActividad == -2) {//comprueba si es por participacion la puntuacion.

    		$a = DB::select("select ID from actividad where
    			nombreactividad like '%participacion%' and 
    			idgrupo = $variableRequestidGrupo");

    		if(count($a)>0){
    			$idActividad = $a[0]->ID;	
    		}else{
    			return "no existe actividad de participacion";
    		}
    		
    	}else{

    		$idActividad = $variableRequestActividad;
    	}


		$tipoActividad = 0;

		$puntosTotales=0;

		$nombreActividad="";

    	$perfil = User::where('email',$correo)->get();

    	$actividad =  Actividad::where('id',$idActividad)->get();

    	/*comienzan las validaciones*/

    	if (count($actividad)>0) {//si la actividad existe pasa al siguiente nivel

    		//busca el detalle punto para saber cuantos puntos tiene esta actividad
    		$detallePunto = DetallePunto::where('id',$actividad[0]->IDDETALLEPUNTO)->get();


    		if($detallePunto[0]->ESTAACTIVOPUNTO == 1 && count($perfil)>0){//Comprueba que el punto siga activo
	    		$detallePuntoActividad = new DetallePuntoActividad();

	    		$detallePuntoActividad->IDPERFIL = $perfil[0]->id;
	    		$detallePuntoActividad->IDACTIVIDAD = $actividad[0]->id;
	    		$detallePuntoActividad->PUNTAJEGANADO = $detallePunto[0]->PUNTOSACTIVIDAD;

	    		$detallePuntoActividad->save();
	    		$entro =0;

	    		for ($i=0; $i < strlen ($actividad[0]->NOMBREACTIVIDAD) ; $i++) {  //obtiene la primera palabra de la actividad
	    			if($actividad[0]->NOMBREACTIVIDAD[$i] != " " && $entro== 0){
	    				$nombreActividad = $nombreActividad .$actividad[0]->NOMBREACTIVIDAD[$i];

	    	
	    			}else{
	    				$entro = 1;
	    			}
	    		}//fin del foreach
	    		

	    		$puntosAcumulados = DetallePuntoActividad::where('IDPERFIL',$perfil[0]->id)->get();


	    		foreach ($puntosAcumulados as $puntos) {
	    			$puntosTotales = $puntosTotales + $puntos->PUNTAJEGANADO;
	    		}



	    		$idGrupo = $actividad[0]->IDGRUPO;//guardo el grupo en una variable

	    		//obtengo la materia impartida con el grupo que conseguimos anteriormente
	    		$materiaImpartida = DB::select("select * from grupo 
	    			join materiaimpartida on materiaimpartida.id = grupo.idmateriaimpartida
	    			where grupo.id = $idGrupo");

	    		$idMateriaImpartida = $materiaImpartida[0]->id;

	    		//ahora obtenemos los DetallesMedallas de esta materia 

	    		$detalleMedallas = DB::select("select * from detallemedalla
	    			where idmateriaimpartida = $idMateriaImpartida" );

	    		
	    		$medalla = null;
	    		$idDetalleMedalla = 0;

	    		foreach ($detalleMedallas as $detalles) {
	    			
	    			if (count($medalla)==0) {

	    				$medalla = DB::select("select * from medalla 
	    				where (id = $detalles->IDMEDALLA) and
	    				(nombremedalla like '%$nombreActividad%' or 
	    				descripcionmedalla like '%$nombreActividad%')
	    				");

	    				$idDetalleMedalla = $detalles->id;
	    			}
	    			
	    			
	    		}//fin del foreach de detalleMedallas

	    		if (count($medalla)>0) {//si la medalla es mayor que cero
	    			$detalleMedallaAGanar = DB::select("select *from detallemedalla
	    				where id = $idDetalleMedalla");

	    			if($puntosTotales >= $detalleMedallaAGanar[0]->CANTIDADMINIMAPUNTOS){//COMPRUEBA SI YA ES ACREEDOR DE LA MEDALLA

	    				$idDetalleMedalla = $detalleMedallaAGanar[0]->id;
	    				$idPerfil = $perfil[0]->id;

	    				$medallaGanada = DB::select("select *from medallaganada
	    					where iddetallemedalla = $idDetalleMedalla and
	    					idperfil = $idPerfil");


	    				if (count($medallaGanada)>0) {//comprueba si ya tiene la medalla
	    					return "se ingresaron los puntos correctamente";
	    				}else{//si no la ha ganado se le asigna
	    					$medalla = new MedallaGanada();

	    					$medalla->IDDETALLEMEDALLA =  $idDetalleMedalla;
	    					$medalla->IDPERFIL = $idPerfil;

	    					$medalla->save();

	    					return "Se ha ganado una medalla";
	    				}

	    				return "Se ha ganado una medallla";

	    			}else{
	    				return "se ingresaron los puntos correctamente";
	    			}

	    		}



   			}//fin de comprobacion de detallePunto

    	}else{//fin de comprobacion de actividad

    		return "no existe dicha actividad";

		}//fin de if-else actividad
    	
    	
	}


}
