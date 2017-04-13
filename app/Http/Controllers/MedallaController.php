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

        $detalleMedallasAll = DetalleMedalla::all();
        
        if($detalleMedallasAll->count() > 0){
            //Traer todos los detalleMedalla
            $detalleMedalla = DetalleMedalla::where('IDMATERIAIMPARTIDA', $matImp->id)->first();
            //Asignar la Medalla
            $medalla = Medalla::find($detalleMedalla->IDMEDALLA);
        }else{
            //Si no hay Medallas
            $detalleMedalla = null;
            $medalla = null;
        }
        

        return view('medalla.index')->with([
            'detalleMedalla'=>$detalleMedalla, 
            'materia'=>$materia, 
            'medalla'=>$medalla
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
        //Seguir guardando la Medalle y Detalle Medalla
        //no hartaganees maje xD
        dd($request->all());
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
}
