<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Categoria;
use App\Coordinador;
use App\Materia;
use App\Ciclo;
use App\MateriaImpartida;
use App\MedallaGanada;
use App\Cuestionario;
use App\CuestionarioMateria;
use Laracasts\Flash\Flash;

class CuestionarioController extends Controller
{
    public function __construct()
   	{
   		$this->middleware('auth');
   	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idDocente = Auth::user()->IDDOCENTE;
        //dd($idDocente);
        /*CUESTIONARIO-MATERIA*/
        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        //
        $coordinador = Coordinador::where('IDDOCENTE', $idDocente)->get();
        $coordinador->each(function($coordinador){
            $coordinador->materiaImpartida = MateriaImpartida::find($coordinador->IDMATERIAIMPARTIDA);
        });
        
        foreach($coordinador as $coor){
            if($coor->materiaImpartida->IDCICLO == $ciclo->id){
                //Materia que Coordina el Docente
                $matImp = MateriaImpartida::find($coor->materiaImpartida->id);
            }
        }
        
        $cuestionariomateria = CuestionarioMateria::where('IDMATERIAIMPARTIDA', $matImp->id)->get();
        
        if(count($cuestionariomateria) > 0){
            foreach($cuestionariomateria as $cuesMat){
                $cuesMat->cuestionario = Cuestionario::where('id', $cuesMat->IDCUESTIONARIO)->first();
            }
        }
        //dd($cuestionariomateria);
        return view('cuestionario.index')->with('cuestionariomateria', $cuestionariomateria);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuestionario.crear');
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
        
        /* Cuestionario */
        $idDocente = Auth::user()->IDDOCENTE;
        $cuestionario = new Cuestionario();
        //Crear Array con FechaInicio, - , FechaFin
        $split = explode(" al ", $request->daterange_);
        $cuestionario->FECHAINICIOCUESTIONARIO = $split[0];
        $cuestionario->FECHAFINCUESTIONARIO    = $split[1];

        $cuestionario->IDDOCENTE = $idDocente;
        $cuestionario->fill($request->all());

        $cuestionario->save();

        /*CUESTIONARIO-MATERIA*/
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
            }
        }
        
        /*CUESTIONARIO*/
        $cuestionariomateria = new CuestionarioMateria();

        $cuestionariomateria->IDMATERIAIMPARTIDA = $matImp->id;
        $cuestionariomateria->IDCUESTIONARIO = $cuestionario->id;

        $cuestionariomateria->save();

        Flash::info("Se creado el cuestionario: ".$cuestionario->NOMBRECUESTIONARIO." de forma exitosa");
        return redirect()->route('cuestionarios.index');
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
