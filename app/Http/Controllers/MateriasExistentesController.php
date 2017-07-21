<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class MateriasExistentesController extends Controller
{

    /*
    	Metodo que consulta en la base de datos 
      	las materias impartidas por los docentes
      	en un ciclo activo
    */

	public function materiasDocente(Request $request){

		    //Recibe los datos del cliente
	 	    $email = $request->email;
	  	  $tipousuario = $request->resultado;

	  	  //Consulta a la base de datos
	  	  $consulta = "SELECT m.id IDMATERIA, g.id IDGRUPO, p.id IDPERFIL, d.NOMBREDOCENTE, c.CODIGOCICLO, m.NOMBREMATERIA, m.CODIGOMATERIA, g.CODIGOGRUPO, m.IMAGENMATERIA FROM materia m INNER JOIN materiaimpartida mi on m.id = mi.IDMATERIA INNER JOIN grupo g ON mi.id = g.IDMATERIAIMPARTIDA INNER JOIN docente d ON g.IDDOCENTE = d.id INNER JOIN tipogrupo tp ON g.IDTIPOGRUPO = tp.id INNER JOIN perfil p ON p.IDDOCENTE = d.id INNER JOIN ciclo c ON c.id = mi.IDCICLO WHERE p.email = '" . $email . "' AND tp.NOMBRETIPOGRUPO = 'Teorico' AND c.ESTAACTIVOCICLO = 1";

  	  	$materiaExistente = DB::select(DB::raw($consulta));

	     	//Convierte la imagen a base64
	     	foreach($materiaExistente as $me){
            
            try{
                $me->IMAGENMATERIA=  base64_encode( file_get_contents(public_path()."/gogame/FotoMateria/".$me->IMAGENMATERIA));
            }catch(Exception $e) {
                error_log('error');
            }

      	}
      
      	//Convierte el resultado de la consulta a formato json
      	$resultado = json_encode($materiaExistente);
	  
      	return $resultado;     

	}

	/*
    	Metodo que consulta en la base de datos 
      	las materias inscritas por los estudiantes
      	en un ciclo activo
    */

	public function materiasEstudiante(Request $request){

		    //Recibe los datos del cliente
		    $email = $request->email;
	  	  $tipousuario = $request->resultado;

	  	  //Consulta a la base de datos
	  	  $consulta = "SELECT m.id IDMATERIA, g.id IDGRUPO, p.id IDPERFIL, e.NOMBREESTUDIANTE, c.CODIGOCICLO, m.NOMBREMATERIA, m.CODIGOMATERIA, g.CODIGOGRUPO, m.IMAGENMATERIA  FROM estudiante e INNER JOIN inscripcion i ON e.id = i.IDESTUDIANTE INNER JOIN grupo g ON i.IDGRUPO = g.id INNER JOIN tipogrupo tg ON g.IDTIPOGRUPO = tg.id INNER JOIN materiaimpartida mi ON mi.id = g.IDMATERIAIMPARTIDA INNER JOIN materia m ON m.id = mi.IDMATERIA INNER JOIN perfil p ON p.IDESTUDIANTE = e.id INNER JOIN ciclo c ON c.id = mi.IDCICLO WHERE p.email = '" . $email . "' AND tg.NOMBRETIPOGRUPO = 'Teorico' AND c.ESTAACTIVOCICLO = 1;";

	  	  $materiaExistente = DB::select(DB::raw($consulta));

	  	  //Convierte la imagen a base64
	  	  foreach($materiaExistente as $me){
            
            try{
                $me->IMAGENMATERIA=  base64_encode( file_get_contents(public_path()."/gogame/FotoMateria/".$me->IMAGENMATERIA));
            }catch(Exception $e) {
                error_log('error');
            }

      	}
      
      	//Convierte el resultado de la consulta a formato json
      	$resultado = json_encode($materiaExistente);
	  	
      	return $resultado;

	}

}
