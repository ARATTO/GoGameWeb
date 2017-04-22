<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

use Auth;
use App\Ciclo;
use App\User;
use App\MateriaImpartida;
use App\Materia;
use App\Grupo;
use App\Docente;
use App\TipoGrupo;
use App\Inscripcion;
use App\Estudiante;

use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use Laracasts\Flash\Flash;
use Storage;
use Excel;

class InscripcionController extends Controller
{
    public function index()
    {   
        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        $materiasImpartidas = MateriaImpartida::where('IDCICLO', $ciclo->id)->get();
        //Recorrer para Obtener las Materias
        $materiasImpartidas->each(function($materiasImpartidas){
            $materiasImpartidas->materia = Materia::find($materiasImpartidas->IDMATERIA);
        });
        //Obtener Docente logueado
        $idDocente = Auth::user()->IDDOCENTE;
        $grupoAll = Grupo::all();
        
        //Inicializar Collection para enviar a view
        $grupos = Collection::make();

        if($grupoAll != null){
            //Recorrer Grupos para Presentar la Informacion
            $grupoAll->each(function($grupoAll){
                $grupoAll->docente = Docente::find($grupoAll->IDDOCENTE);
                $grupoAll->tipoGrupo = TipoGrupo::find($grupoAll->IDTIPOGRUPO);
                $grupoAll->materiaImpartida = MateriaImpartida::find($grupoAll->IDMATERIAIMPARTIDA);
                $grupoAll->materia = Materia::find($grupoAll->materiaImpartida->IDMATERIA);
                $grupoAll->ciclo = Ciclo::find($grupoAll->materiaImpartida->IDCICLO);
            });
            foreach($grupoAll as $grupo){
                foreach($materiasImpartidas as $matImp){
                    //Si materiaimpartida es de este ciclo y si es docente logueado
                    if($grupo->IDMATERIAIMPARTIDA == $matImp->id && $grupo->IDDOCENTE == $idDocente){
                        //Guardar grupo en Collection
                        $grupos->push($grupo);
                    }
                }
            }
        }else{
            //Si no hay grupos
            $grupos = Collection::make();
        }
        //dd($grupos);
        return view('inscripcion.index')->with(['grupos' => $grupos]);
    }

    public function inscribir(Request $request, $id)
    {
        //Guardar Grupo a tratar
	    Cache::put('idGrupo', $id , 2); // 2 Minutos que esta en Cache

	    $archivo = $request->file('ArchivoExcel');
        $nombre_original = $archivo->getClientOriginalName();
	   	$extension=$archivo->getClientOriginalExtension();
        $r1 = Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
        $ruta  =  storage_path('archivos') ."\\". $nombre_original;
		//dd($ruta);
        //Si el archivo esta en la ruta de forma correcta
        if($r1){
            //Cargar Funcion "hoja" sobre archivo
		    Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
                //Obtener hoja
                $result = $hoja->get();
                //Sacar Variable de Cache
                $idGrupo = Cache::get('idGrupo');
                //Recorre cada fila de la hoja
                foreach ($result as $fila) {

                    //Si el Carnet o el Nombre estan vacios ...
                    if($fila->carnet != "" && $fila->nombre != ""){
                        //obtener estudiante
                        $estudiante = Estudiante::where('CARNETESTUDIANTE', $fila->carnet)
                                                ->first();
                        //SI EL ESTUDIANTE EXISTE
                        if( count($estudiante) > 0 ){
                            //EXISTE
                            //Comprobar si ya esta inscrito
                            $inscripcion = Inscripcion::where('IDGRUPO', $idGrupo)
                                                    ->where('IDESTUDIANTE', $estudiante->id)
                                                    ->first();   
                            //Si, NO esta inscrito                                              
                            if( count($inscripcion) == 0 ){
                                //Inscribirlo
                                $inscripcion = new Inscripcion;
                                $inscripcion->IDGRUPO = $idGrupo;
                                $inscripcion->IDESTUDIANTE = $estudiante->id;
                                $inscripcion->save();
                                /*
                                //Estudiante Inscrito en el Grupo
                                */
                            }else{
                                /*
                                //Ya esta inscrito en el Grupo seleccionado
                                */
                            }
                        }else{
                            //
                            //Crear Estudiante
                            //
                            $estudiante = new Estudiante;
                            $estudiante->NOMBREESTUDIANTE = $fila->nombre;
                            $estudiante->CARNETESTUDIANTE = $fila->carnet;
                            $estudiante->save();
                            //
                            //Crear Perfil
                            //
                            $User = new User();
                            //Extraemos Nombre
                            $split = explode(" ", $fila->nombre);
                            $firstname = array_shift($split);
                            //Credenciales de Usuario
                            $User->NOMBREPERFIL = $firstname;
                            //Correo Institucional modificable
                            $User->email = strtolower( $fila->carnet ) . trans('gogamessage.correoInstitucional');
                            //El Pasword es el CARNET
                            $User->password = bcrypt($fila->carnet);
                            //Se puede modificar la imagen _default de los estudiantes modificando el nombre de esta imagen
                            $User->IMAGENPERFIL = '_PerfilDefault.png';
                            //Es Estudiante
                            $User->IDESTUDIANTE = $estudiante->id;
                            //Es Activo
                            $User->ESACTIVO = 1;
                            //Administrador y Docente en NULL
                            $User->save();

                            //
                            //Inscribir nuevo estudiante
                            //
                            $inscripcion = new Inscripcion;
                            $inscripcion->IDGRUPO = $idGrupo;
                            $inscripcion->IDESTUDIANTE = $estudiante->id;
                            $inscripcion->save();

                            /*
                            // Estudiante Inscrito con Exito y su perfil esta listo para usar
                            */

                        }
                        
                    }else{
                        /*
                        // Tiene Filas con campos Vacios
                        */
                    }
                //Se cierra ForEach
                }
            //Se Cierra Funcion Excel
			})->get();

			Flash::info("Se han inscrito los Estudiantes de forma exitosa");
		    return redirect()->route('inscripcion.inscritos', $id);
       }
       else
       {
			Flash::error("Se producido un error al momento de importar el archivo");
			return redirect()->route('inscripcion.inscribir');
       }

    }


    public function inscritos($id)
    {
        //Traer Grupo con Materia
        $grupo = Grupo::find($id);
        $grupo->materiaImpartida = MateriaImpartida::find($grupo->IDMATERIAIMPARTIDA);
        $grupo->materia = Materia::find($grupo->materiaImpartida->IDMATERIA);
        $grupo->tipoGrupo = TipoGrupo::find($grupo->IDTIPOGRUPO);

        $inscripciones = Inscripcion::where('IDGRUPO', $grupo->id)->get();

        if($inscripciones->count() > 0){
            foreach($inscripciones as $inscripcion){
                $inscripcion->estudiante = Estudiante::find($inscripcion->IDESTUDIANTE);
            }
        }else{
            $inscripciones = null;
        }
        
        return view('inscripcion.inscritos')->with([
            'inscripciones' => $inscripciones,
            'grupo' => $grupo
            ]);    
    }

    public function desinscribir($id, $grupo)
    {
        $inscripcion = Inscripcion::where('IDGRUPO',$grupo )
                                  ->where('IDESTUDIANTE', $id)
                                  ->first();
        if($inscripcion){
            $inscripcion->delete();
            Flash::success("Estudiante dado de baja con exito");
        }else{
            Flash::info("No existe el Estudiante que desea dar de baja");
        }

        return redirect()->route('inscripcion.inscritos', $grupo);
    }
}
