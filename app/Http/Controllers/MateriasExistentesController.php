<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class MateriasExistentesController extends Controller
{
    //
	public function store(Request $request){

	 	$email = $request->email;
	  	$tipousuario = $request->resultado;

	  	$consulta = "SELECT m.id IDMATERIA, g.id IDGRUPO, d.NOMBREDOCENTE, m.NOMBREMATERIA, m.CODIGOMATERIA, g.CODIGOGRUPO, m.IMAGENMATERIA FROM materia m INNER JOIN materiaimpartida mi on m.id = mi.IDMATERIA INNER JOIN grupo g ON mi.id = g.IDMATERIAIMPARTIDA INNER JOIN docente d ON g.IDDOCENTE = d.id INNER JOIN tipogrupo tp ON g.IDTIPOGRUPO = tp.id INNER JOIN perfil p ON p.IDDOCENTE = d.id WHERE p.email = '" . $email . "' AND tp.NOMBRETIPOGRUPO = 'Teorico';";

	  

	  
	  $materiaExistente = DB::select(DB::raw($consulta));

	  foreach($materiaExistente as $me){
            
            try{
                $me->IMAGENMATERIA=  base64_encode( file_get_contents(public_path()."/gogame/FotoMateria/".$me->IMAGENMATERIA));
            }catch(Exception $e) {
                error_log('error');
            }

      }
      
      $resultado = json_encode($materiaExistente);
	  //dd($resultado);
      return $resultado;     

	}

	public function store2(Request $request){

		$email = $request->email;
	  	$tipousuario = $request->resultado;

	  	$consulta = "SELECT m.id IDMATERIA, g.id IDGRUPO, e.NOMBREESTUDIANTE, m.NOMBREMATERIA, m.CODIGOMATERIA, g.CODIGOGRUPO, m.IMAGENMATERIA FROM estudiante e INNER JOIN inscripcion i ON e.id = i.IDESTUDIANTE INNER JOIN grupo g ON i.IDGRUPO = g.id INNER JOIN tipogrupo tg ON g.IDTIPOGRUPO = tg.id INNER JOIN materiaimpartida mi ON mi.id = g.IDMATERIAIMPARTIDA INNER JOIN materia m ON m.id = mi.IDMATERIA INNER JOIN perfil p ON p.IDESTUDIANTE = e.id WHERE p.email = '" . $email . "' AND tg.NOMBRETIPOGRUPO = 'Teorico';";

	  	$materiaExistente = DB::select(DB::raw($consulta));

	  	foreach($materiaExistente as $me){
            
            try{
                $me->IMAGENMATERIA=  base64_encode( file_get_contents(public_path()."/gogame/FotoMateria/".$me->IMAGENMATERIA));
            }catch(Exception $e) {
                error_log('error');
            }

      	}
      
      	$resultado = json_encode($materiaExistente);
	  	//dd($resultado);
      	return $resultado;


	}


}
