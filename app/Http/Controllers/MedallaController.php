<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Medalla;
use App\DetalleMedalla;
use App\Coordinador;
use App\Materia;
use App\Ciclo;
use App\MateriaImpartida;
use App\MedallaGanada;
use App\Actividad;
use App\DetallePunto;
use App\Grupo;
use App\TipoActividad;
use App\DetallePuntoActividad;
use Laracasts\Flash\Flash;

class MedallaController extends Controller
{
    private $MedallaFotoDefault = "_MedallaDefault.png";
    private $MedallaAsistencia = "_Asistencia.png";
    private $MedallaParticipacion = "_Participacion.png";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idDocente = Auth::user()->IDDOCENTE;
        //dd($idDocente);

        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        //
        $coordinador = Coordinador::where('IDDOCENTE', $idDocente)->get();
        $coordinador->each(function($coordinador){
            $coordinador->materiaImpartida = MateriaImpartida::find($coordinador->IDMATERIAIMPARTIDA);
        });
        $Existe = false;
        foreach($coordinador as $coor){
            //dd($coor);
            if($coor->materiaImpartida->IDCICLO == $ciclo->id){
                //Materia que Coordina el Docente
                $matImp = MateriaImpartida::find($coor->materiaImpartida->id);
                $materia = Materia::find($coor->materiaImpartida->IDMATERIA);
                $Existe = true;
            }
        }

        $detalleMedalla = DetalleMedalla::where('IDMATERIAIMPARTIDA', $matImp->id)->get();
        
        if($detalleMedalla->count() > 0){
            //Traer todos los detalleMedalla
            foreach($detalleMedalla as $detalleM){
                $detalleM->medalla = Medalla::find($detalleM->IDMEDALLA);
            }
        }else{
            //Si no hay Medallas
            $detalleMedalla = null;
        }
        
        //dd($detalleMedalla->all());
        return view('medalla.index')->with([
            'detalleMedalla'=>$detalleMedalla, 
            'materia'=>$materia, 
            'matImp' =>$matImp
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idDocente = Auth::user()->IDDOCENTE;

        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        //Obtener la Materia que Coordina
        $coordinador = Coordinador::where('IDDOCENTE', $idDocente)->get();
        $coordinador->each(function($coordinador){
            $coordinador->materiaImpartida = MateriaImpartida::find($coordinador->IDMATERIAIMPARTIDA);
        });
        $Existe = false;
        foreach($coordinador as $coor){
            if($coor->materiaImpartida->IDCICLO == $ciclo->id){
                //Materia que Coordina el Docente
                $matImp = MateriaImpartida::find($coor->materiaImpartida->id);
                $materia = Materia::find($coor->materiaImpartida->IDMATERIA);
                $Existe = true;
            }
        }

        return view('medalla.crear')->with([
            'matImp'=>$matImp,
            'materia'=>$materia
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $grupo = Grupo::where('IDMATERIAIMPARTIDA',$request->IDMATERIAIMPARTIDA)->get();
        //Imagen
        if($request->file('imgMedalla'))
        {
          $Foto = $request->file('imgMedalla');
          $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/gogame/FotoMedalla";
          $Foto->move($path, $nombreFoto);
        }else{
          //Foto por Default
          $nombreFoto = '_MedallaDefault.png';
        }

        //Creacion de Medallas
        /*
        // CREAR MEDALLA ASISTENICIA
        */
        $medalla = new Medalla;
        $medalla->fill($request->all());
        //*********
        //Siempre es CUANTITATIVA !!! POR AHORA *********************
        //*********
        $medalla->ESCUANTITATIVA = 1;
        $medalla->IMAGENMEDALLA = $nombreFoto;
        //Guardar Medalla 
        $medalla->save();
        /*
        //Detalle de Participacion
        */
        $detalleMedalla = new DetalleMedalla;
        $detalleMedalla->fill($request->all());
        $detalleMedalla->IDMEDALLA = $medalla->id;
        //Guardar Detalle Medalla
        $detalleMedalla->save();

        foreach($grupo as $g){
            //DETALLE ACTIVIDAD NUEVA
            $detallePunto = new DetallePunto();
            $detallePunto->IDTIPOPUNTO = 2;
            $detallePunto->IDMATERIAIMPARTIDA = $request->IDMATERIAIMPARTIDA;
            $detallePunto->ESTAACTIVOPUNTO = 1;
            $detallePunto->PUNTOSACTIVIDAD = $request->PUNTOSACTIVIDAD;
            $detallePunto->save();
            
            //CREANDO TIPOACTIVIDAD
            $tipoActividad = new TipoActividad();
            $tipoActividad->NOMBRETIPOACTIVIDAD = $request->NOMBREMEDALLA;
            $tipoActividad->save();

            //ACTIVIDAD NUEVA
            $actividad = new Actividad();
            $actividad->IDTIPOACTIVIDAD = $tipoActividad->id;
            $actividad->IDDETALLEPUNTO = $detallePunto->id;
            $actividad->IDGRUPO = $g->id;
            $actividad->NOMBREACTIVIDAD = $request->NOMBREMEDALLA . ' Actividad';
            $actividad->save();
        }

        /*
        * FIN MEDALLA ASISTENCIA
        */
        return redirect()->route('medallas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleMedalla = DetalleMedalla::find($id);
        $detalleMedalla->medalla = Medalla::find($detalleMedalla->IDMEDALLA);

        $idDocente = Auth::user()->IDDOCENTE;

        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        //Obtener la Materia que Coordina
        $coordinador = Coordinador::where('IDDOCENTE', $idDocente)->get();
        $coordinador->each(function($coordinador){
            $coordinador->materiaImpartida = MateriaImpartida::find($coordinador->IDMATERIAIMPARTIDA);
        });
        $Existe = false;
        foreach($coordinador as $coor){
            if($coor->materiaImpartida->IDCICLO == $ciclo->id){
                //Materia que Coordina el Docente
                $matImp = MateriaImpartida::find($coor->materiaImpartida->id);
            }
        }
        ////
        $detallePunto = DetallePunto::where('IDMATERIAIMPARTIDA', $matImp->id)->first();
        $nombreAct = $detalleMedalla->medalla->NOMBREMEDALLA . ' Actividad';

        $actividad = Actividad::where('NOMBREACTIVIDAD', $nombreAct)->first();
        $detallePunto = DetallePunto::where('id',$actividad->IDDETALLEPUNTO)->where('IDMATERIAIMPARTIDA', $matImp->id)->first();                
                
        
        return view('medalla.editar')->with([
            'detalleMedalla' => $detalleMedalla,
            'matImp' => $matImp,
            'detallePunto' => $detallePunto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $detalleMedalla = DetalleMedalla::find($id);
        $medalla = Medalla::find($detalleMedalla->IDMEDALLA);
        $Fvieja = $medalla->IMAGENMEDALLA;
        //Si no es asistencia o Participacion
        if( $Fvieja != "_Asistencia.png" && $Fvieja != "_Participacion.png" ){
            //Llenar Detalle de Medalla editado
            $detalleMedalla->fill($request->all());
            $detalleMedalla->IDMEDALLA = $medalla->id;
            $detalleMedalla->save();
            //Llenar Medalla editado
            $medalla->fill($request->all());

            $nombreAct = $medalla->NOMBREMEDALLA . ' Actividad';
            $actividad = Actividad::where('NOMBREACTIVIDAD', $nombreAct)->get();
            
            foreach($actividad as $act){
                $detallePunto = DetallePunto::where('id',$act->IDDETALLEPUNTO)->where('IDMATERIAIMPARTIDA', $request->IDMATERIAIMPARTIDA)->first();                
                //dd($detallePunto);
                if($detallePunto){
                    $detallePunto->PUNTOSACTIVIDAD = $request->PUNTOSACTIVIDAD;
                    $detallePunto->save();
                }
            }
            
            if($request->file('imgMedalla') != null)
            {
                $Foto = $request->file('imgMedalla');
                $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
                $path = public_path() . "/gogame/FotoMedalla";
                $Foto->move($path, $nombreFoto);
                //Borrar archivo viejo si no es Default
                $rutaF = $path."/".$Fvieja; //Borra archivo viejo
                if(file_exists($rutaF) ){
                    unlink($rutaF); //Borra archivo de foto
                }
                //Guardar Nueva Imagen
                $medalla->IMAGENMEDALLA = $nombreFoto;
            }else{
                $medalla->IMAGENMEDALLA = $Fvieja; //Guarda vieja foto
            }

            $medalla->save();
            Flash::warning("Se ha EDITADO  de forma exitosa: ".$medalla->NOMBREMEDALLA);
        }else{
            //No se puede editar
            Flash::danger("No puede editar esta Medalla".$medalla->NOMBREMEDALLA);
        }
        
        return redirect()->route('medallas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleMedalla = DetalleMedalla::find($id);
        $medalla = Medalla::find($detalleMedalla->IDMEDALLA);
        $nombreAct = $medalla->NOMBREMEDALLA . ' Actividad';

        $actividad = Actividad::where('NOMBREACTIVIDAD', $nombreAct)->get();
        $Estado = 0;
        foreach($actividad as $act){
            $detallepuntoactividad = DetallePuntoActividad::where('IDACTIVIDAD', $act->id)->first();
            if(count($detallepuntoactividad) > 0){
                $Estado = 1;
            }
        }
        //dd($Estado);
        if($Estado == 1){
            Flash::danger("Medalla: ".$medalla->NOMBREMEDALLA . ' Ya tiene puntos asignados. No se puede Eliminar');
        }else{
            $idDocente = Auth::user()->IDDOCENTE;

            //Obtener las Materias impartidas en Este Ciclo
            $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
            //Obtener la Materia que Coordina
            $coordinador = Coordinador::where('IDDOCENTE', $idDocente)->get();
            $coordinador->each(function($coordinador){
                $coordinador->materiaImpartida = MateriaImpartida::find($coordinador->IDMATERIAIMPARTIDA);
            });
            $Existe = false;
            foreach($coordinador as $coor){
                if($coor->materiaImpartida->IDCICLO == $ciclo->id){
                    //Materia que Coordina el Docente
                    $matImp = MateriaImpartida::find($coor->materiaImpartida->id);
                }
            }
            $grupo = Grupo::where('IDMATERIAIMPARTIDA',$matImp->id)->get();

            $medallaGanada = MedallaGanada::where('IDDETALLEMEDALLA',$detalleMedalla->id)->first();

            if($medallaGanada != null){
                Flash::danger("No puede eliminar la Medalla: " . $medalla->NOMBREMEDALLA . " pues esta en uso");
            }else{
                $detalleMedalla->delete();
                $nombreAct = $medalla->NOMBREMEDALLA . ' Actividad';
                $medalla->delete();
                
                $actividad = Actividad::where('NOMBREACTIVIDAD', $nombreAct)->get();
                
                foreach($actividad as $act){
                    $detallePunto = DetallePunto::where('id',$act->IDDETALLEPUNTO)->where('IDMATERIAIMPARTIDA', $matImp->id)->first();                
                    $tipoActividad = TipoActividad::where('id',$act->IDTIPOACTIVIDAD)->first();

                    $act->delete();
                    $detallePunto->delete();
                    $tipoActividad->delete();
                }
                Flash::danger("Medalla :".$medalla->NOMBREMEDALLA . ' Eliminada con exito');
            }                   
        }
        

        
       return redirect()->route('medallas.index');
    }

    public function default(Request $request)
    {
        //dd($request->all());
        $materiaImpartida = MateriaImpartida::find($request->IDMATERIAIMPARTIDA);
        $materia = Materia::find($materiaImpartida->IDMATERIA);
        $grupo = Grupo::where('IDMATERIAIMPARTIDA',$materiaImpartida->id)->get();

        //Creacion de Medallas de Participacion y Asistencia
        /*
        // CREAR MEDALLA ASISTENICIA
        */
        $medalla = new Medalla;
        $medalla->NOMBREMEDALLA = 'Asistencia' . $materia->CODIGOMATERIA;
        $medalla->DESCRIPCIONMEDALLA = 'Medalla de Asistencia para ' . $materia->CODIGOMATERIA;
        $medalla->ESCUANTITATIVA = 1;
        $medalla->IMAGENMEDALLA = "_Asistencia.png";
        //Guardar Medalla 
        $medalla->save();
        /*
        //Detalle de Asistencia
        */
        $detalleMedalla = new DetalleMedalla;
        $detalleMedalla->IDMATERIAIMPARTIDA = $materiaImpartida->id;
        $detalleMedalla->IDMEDALLA = $medalla->id;
        $detalleMedalla->CANTIDADMINIMAPUNTOS = 50;
        //Guardar Detalle Medalla
        $detalleMedalla->save();

        foreach($grupo as $g){
            //DETALLE ACTIVIDAD
            $detallePunto = new DetallePunto();
            $detallePunto->IDTIPOPUNTO = 2;
            $detallePunto->IDMATERIAIMPARTIDA = $materiaImpartida->id;
            $detallePunto->ESTAACTIVOPUNTO = 1;
            $detallePunto->PUNTOSACTIVIDAD = 5;
            $detallePunto->save();

            //ACTIVIDAD DE ASISTENCIA
            $actividad = new Actividad();
            $actividad->IDTIPOACTIVIDAD = 1;
            $actividad->IDDETALLEPUNTO = $detallePunto->id;
            $actividad->IDGRUPO = $g->id;
            $actividad->NOMBREACTIVIDAD = 'Asistencia';
            $actividad->save();
        }
        

        /*
        * FIN MEDALLA ASISTENCIA
        */

        /*
        // CREAR MEDALLA PARTICIPACION
        */
        $medalla = new Medalla;
        $medalla->NOMBREMEDALLA = 'Participacion' . $materia->CODIGOMATERIA;
        $medalla->DESCRIPCIONMEDALLA = 'Medalla de Participacion para ' . $materia->CODIGOMATERIA;
        $medalla->ESCUANTITATIVA = 1;
        $medalla->IMAGENMEDALLA = "_Participacion.png";
        //Guardar Medalla 
        $medalla->save();
        /*
        //Detalle de Participacion
        */
        $detalleMedalla = new DetalleMedalla;
        $detalleMedalla->IDMATERIAIMPARTIDA = $materiaImpartida->id;
        $detalleMedalla->IDMEDALLA = $medalla->id;
        $detalleMedalla->CANTIDADMINIMAPUNTOS = 5;
        //Guardar Detalle Medalla
        $detalleMedalla->save();

        foreach($grupo as $g){
            //DETALLE ACTIVIDAD
            $detallePunto = new DetallePunto();
            $detallePunto->IDTIPOPUNTO = 2;
            $detallePunto->IDMATERIAIMPARTIDA = $materiaImpartida->id;
            $detallePunto->ESTAACTIVOPUNTO = 1;
            $detallePunto->PUNTOSACTIVIDAD = 1;
            $detallePunto->save();

            //ACTIVIDAD DE PARTICIPACION
            $actividad = new Actividad();
            $actividad->IDTIPOACTIVIDAD = 2;
            $actividad->IDDETALLEPUNTO = $detallePunto->id;
            $actividad->IDGRUPO = $g->id;
            $actividad->NOMBREACTIVIDAD = 'Participacion';
            $actividad->save();
        }
        /*
        * FIN MEDALLA PARTICIPACION
        */
        
        return redirect()->route('medallas.index');
    }
}
