<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class MateriasExistentesController extends Controller
{
    //
	public function store(Request $request){

	  //$email = $request->email;
	  $email = "'manuel_hernandez@hotmail.com'";
	  //$email = "'elias_barrera@hotmail.com'";
	  //$tipousuario = $request->resultado;

	  //if(resultado == 1)
   	  $consultaDocente = "SELECT m.id IDMATERIA, g.id IDGRUPO, d.NOMBREDOCENTE, m.NOMBREMATERIA, m.CODIGOMATERIA, g.CODIGOGRUPO, m.IMAGENMATERIA FROM materia m INNER JOIN materiaimpartida mi on m.id = mi.IDMATERIA INNER JOIN grupo g ON mi.id = g.IDMATERIAIMPARTIDA INNER JOIN docente d ON g.IDDOCENTE = d.id INNER JOIN tipogrupo tp ON g.IDTIPOGRUPO = tp.id INNER JOIN perfil p ON p.IDDOCENTE = d.id WHERE p.email = " . $email . " AND tp.NOMBRETIPOGRUPO = 'Teorico';";

				//dd($consultaDocente);

	  $consultaEstudiante = "SELECT m.id IDMATERIA, g.id IDGRUPO, e.NOMBREESTUDIANTE, m.NOMBREMATERIA, m.CODIGOMATERIA, g.CODIGOGRUPO, m.IMAGENMATERIA FROM estudiante e INNER JOIN inscripcion i ON e.id = i.IDESTUDIANTE INNER JOIN grupo g ON i.IDGRUPO = g.id INNER JOIN tipogrupo tg ON g.IDTIPOGRUPO = tg.id INNER JOIN materiaimpartida mi ON mi.id = g.IDMATERIAIMPARTIDA INNER JOIN materia m ON m.id = mi.IDMATERIA INNER JOIN perfil p ON p.IDESTUDIANTE = e.id WHERE p.email = " . $email . " AND tg.NOMBRETIPOGRUPO = 'Teorico';";

	  $materiaExistente = DB::select(DB::raw($consultaDocente));

	  foreach($materiaExistente as $me){
            
            try{
                $me->IMAGENMATERIA=  base64_encode( file_get_contents(public_path()."/gogame/FotoMateria/".$me->IMAGENMATERIA));
            }catch(Exception $e) {
                error_log('error');
            }

      }
      
      $resultado = json_encode($materiaExistente);
      //dd($resultado);
      return 0;     

	}


}
