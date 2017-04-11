<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

use App\Http\Requests;
use App\Ciclo;
use App\Materia;
use App\MateriaImpartida;
use Laracasts\Flash\Flash;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
   	{
   		$this->middleware('auth');
   	}

    public function index()
    {   
        $ciclos = Ciclo::orderBy('id')->get();

        return view('ciclo.index')->with(['ciclos'=>$ciclos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciclo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ciclo = new Ciclo;
        $ciclo->CODIGOCICLO = $request->CODIGOCICLO;
        //Crear Array con FechaInicio, - , FechaFin
        $split = explode(" ", $request->daterange);
        $ciclo->FECHAINICIO = $split[0];
        $ciclo->FECHAFIN    = $split[2];
        //Si desea el Usuario Activar el Ciclo
        if($request->ESTAACTIVOCICLO == 1){
            //Buscar ciclo activo e Inactivarlo
            $CicloActivo = Ciclo::where('ESTAACTIVOCICLO',1)->first();
            $CicloActivo->ESTAACTIVOCICLO = 0;
            $CicloActivo->save();
            //Activar
            $ciclo->ESTAACTIVOCICLO = 1;
            
            Flash::warning("Se ha CREADO y ACTIVADO Ciclo: ".$ciclo->CODIGOCICLO." de forma exitosa");
        }else{
            Flash::success("Se ha CREADO Ciclo: ".$ciclo->CODIGOCICLO." de forma exitosa");
        }
        //Guardar Ciclo Creado
        $ciclo->save();

        return redirect()->route('ciclos.index');
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
        $Ciclo = Ciclo::find($id);
        $RangoFecha = $Ciclo->FECHAINICIO . " al " . $Ciclo->FECHAFIN;

        return view('ciclo.editar')->with(['ciclo'=>$Ciclo, 'rangoFecha'=>$RangoFecha]);
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

        $ciclo = Ciclo::find($id);
        $ciclo->fill($request->all());

        //Crear Array con FechaInicio, - , FechaFin
        $split = explode(" ", $request->daterange);
        $ciclo->FECHAINICIO = $split[0];
        $ciclo->FECHAFIN    = $split[2];

        $ciclo->save();

        return redirect()->route('ciclos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Ciclo solicitado
        $Ciclo = Ciclo::find($id);
        //¿Nunca ha sido Utlizado?
        if($Ciclo->ESTAACTIVOCICLO == null){
            //ELiminar Ciclo
            $Ciclo->delete();
            Flash::info("Ciclo: ".$Ciclo->CODIGOCICLO." ELIMINADO exitosamente.");
        }else{
            //¿Esta Activo (1) o Ha estado Activo antes (0)?
            if($Ciclo->ESTAACTIVOCICLO == 1){
                Flash::warning("Lo sentimos, No podemos eliminar el Ciclo :".$Ciclo->CODIGOCICLO." pues, esta ACTIVO");
            }else{
                Flash::warning("Lo sentimos, No podemos eliminar el Ciclo :".$Ciclo->CODIGOCICLO." pues, ha sido utilizado antes.");
            }
        }
        return redirect()->route('ciclos.index');
    }

    public function activar($id){
        
        //Buscar ciclo activo e Inactivarlo
        $CicloActivo = Ciclo::where('ESTAACTIVOCICLO',1)->first();
        $CicloActivo->ESTAACTIVOCICLO = 0;
        $CicloActivo->save();

        //Activar Ciclo solicitado
        $Ciclo = Ciclo::find($id);
        $Ciclo->ESTAACTIVOCICLO = 1;
        $Ciclo->save();

        Flash::info("Ciclo : ".$Ciclo->CODIGOCICLO." ACTIVADO de forma exitosa");

        return redirect()->route('ciclos.index');
    }

    public function asignar($id){

        $ciclo = Ciclo::find($id);
        $materias = Materia::all();
        $MateriasImpartidas = MateriaImpartida::where('IDCICLO', $id)->get();

        $MateriaAsociada = Collection::make();
        $MateriaNoAsociada = Collection::make();

        $MatAsociada = Collection::make();

        if($MateriasImpartidas->count() == 0){
            $MateriaAsociada = null;
        }else{
            foreach ($materias as $materia) {
                foreach ($MateriasImpartidas as $materiaImp) {
                    if($materia->id == $materiaImp->IDMATERIA){
                        $MateriaAsociada->push($materias->shift());
                    }
                }
            }
        }
        //Limpiar de Null
        /*
        foreach ($MateriaAsociada as $matAso) {
            if($matAso != null){
                $MatAsociada->push( $matAso );
            }
        }
        */

        //dd($materias->all() , $MateriaAsociada->all());

        return view('ciclo.asignar')->with(['ciclo'=>$ciclo, 
                                            'materias'=>$materias, 
                                            'MateriaAsociada'=>$MateriaAsociada]);
    }
    public function asignadas(Request $request, $id){
        $ciclo = Ciclo::find($id);
        //Recibe Array de Materias Seleccionadas para el Ciclo
        if($request->MateriaSeleccionada){
            foreach($request->MateriaSeleccionada as $materia){
                //Consulta si ya existe en la Tabla
                $existeMateriaImpartida = MateriaImpartida::where('IDCICLO', $ciclo->id)
                                        ->where('IDMATERIA', $materia)->first();
                //Si, No esta Asociada al ciclo?
                if(!$existeMateriaImpartida){
                    //Crear Nueva Materia Impartida
                    $materiaImpartida = new MateriaImpartida;

                    $materiaImpartida->IDCICLO = $ciclo->id;
                    $materiaImpartida->IDMATERIA = $materia;
                    //Guardar Materia Impartida
                    $materiaImpartida->save();
                }
                //Si esta Asociada No hace nada.
            }
        }
        //Si quiere Borrar Materias de la Relacion
        if($request->MateriaBorrar){
            foreach($request->MateriaBorrar as $materia){
                //Consulta si efectivamente ya existe en la Tabla
                $existeMateriaImpartida = MateriaImpartida::where('IDCICLO', $ciclo->id)
                                        ->where('IDMATERIA', $materia)->first();
                //Si, No esta Asociada al ciclo?
                if($existeMateriaImpartida){
                    $existeMateriaImpartida->delete();
                }
            }
        }
        
        Flash::info("Materias Asociadas al Ciclo : ".$ciclo->CODIGOCICLO." realizado de forma exitosa");
        return redirect()->route('ciclos.index');
    }
}
