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
        dd($request->all());
        //Imagen
        if($request->file('imgMedalla'))
        {
          $Foto = $request->file('imgMedalla');
          $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/gogame/FotoMedalla";
          $Foto->move($path, $nombreFoto);
        }else{
          //Foto por Default
          $nombreFoto = $MedallaFotoDefault;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function default(Request $request)
    {
        //dd($request->all());
        $materiaImpartida = MateriaImpartida::find($request->IDMATERIAIMPARTIDA);
        $materia = Materia::find($materiaImpartida->IDMATERIA);

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
        //Detalle de Participacion
        */
        $detalleMedalla = new DetalleMedalla;
        $detalleMedalla->IDMATERIAIMPARTIDA = $materiaImpartida->id;
        $detalleMedalla->IDMEDALLA = $medalla->id;
        $detalleMedalla->CANTIDADMINIMAPUNTOS = 50;
        //Guardar Detalle Medalla
        $detalleMedalla->save();
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
        $detalleMedalla->CANTIDADMINIMAPUNTOS = 2;
        //Guardar Detalle Medalla
        $detalleMedalla->save();
        /*
        * FIN MEDALLA PARTICIPACION
        */
        
        return redirect()->route('medallas.index');
    }
}
