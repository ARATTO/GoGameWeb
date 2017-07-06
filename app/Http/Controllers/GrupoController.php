<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Docente;
use App\TipoGrupo;
use App\MateriaImpartida;
use App\Materia;
use App\Grupo;
use App\User;
use App\Ciclo;

use App\Http\Requests;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();
        //Recorrer Grupos para Presentar la Informacion
        $grupos->each(function($grupos){
            $grupos->docente = Docente::find($grupos->IDDOCENTE);
            $grupos->tipoGrupo = TipoGrupo::find($grupos->IDTIPOGRUPO);
            $grupos->materiaImpartida = MateriaImpartida::find($grupos->IDMATERIAIMPARTIDA);
            $grupos->materia = Materia::find($grupos->materiaImpartida->IDMATERIA);
            $grupos->ciclo = Ciclo::find($grupos->materiaImpartida->IDCICLO);
        });

        return view('grupo.index')->with(['grupos'=>$grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtener Docentes Activos
        $docentes = User::where('IDDOCENTE','<>',NULL)
                        ->where('ESACTIVO',1)->get();
        //Tipo de Grupo GT , GL , GD
        $tipoGrupos = TipoGrupo::all();
        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        $materiasImpartidas = MateriaImpartida::where('IDCICLO', $ciclo->id)->get();
        //Recorrer para Obtener las Materias
        $materiasImpartidas->each(function($materiasImpartidas){
            $materiasImpartidas->materia = Materia::find($materiasImpartidas->IDMATERIA);
        });

        //dd($docentes);

        return view('grupo.crear')->with([
            'docentes'=>$docentes, 
            'tipoGrupos'=>$tipoGrupos, 
            'materiasImpartidas'=>$materiasImpartidas
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
        
        $grupo = new Grupo;
        $grupo->fill($request->all());
        $grupo->save();
        
        Flash::info("Se ha registrado ".$grupo->CODIGOGRUPO." de forma exitosa");
        return redirect()->route('grupos.index');
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
        //Traer Grupo a Editar
        $grupo = Grupo::find($id);
        //Obtener Docentes Activos
        $docentes = User::where('IDDOCENTE','<>',NULL)
                        ->where('ESACTIVO',1)->get();
        //Tipo de Grupo GT , GL , GD
        $tipoGrupos = TipoGrupo::all();
        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        $materiasImpartidas = MateriaImpartida::where('IDCICLO', $ciclo->id)->get();
        //Recorrer para Obtener las Materias
        $materiasImpartidas->each(function($materiasImpartidas){
            $materiasImpartidas->materia = Materia::find($materiasImpartidas->IDMATERIA);
        });

        return view('grupo.editar')->with([
            'grupo'=>$grupo,
            'docentes'=>$docentes, 
            'tipoGrupos'=>$tipoGrupos, 
            'materiasImpartidas'=>$materiasImpartidas
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
        $grupo = Grupo::find($id);
        $grupo->fill($request->all());
        $grupo->save();
        
        Flash::warning("Se ha actualizado ".$grupo->CODIGOGRUPO." de forma exitosa");
        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();

        Flash::danger("Se ha Eliminado ".$grupo->CODIGOGRUPO." de forma exitosa");
        return redirect()->route('grupos.index');
    }
}
