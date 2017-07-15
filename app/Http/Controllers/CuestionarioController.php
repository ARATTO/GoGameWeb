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
use App\CategoriaCuestionario;
use App\Pregunta;
use Illuminate\Support\Collection;
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
                $categorias = Categoria::where('IDMATERIAIMPARTIDA', $matImp->id)->get();
            }
        }
        
        
        $cuestionariomateria = CuestionarioMateria::where('IDMATERIAIMPARTIDA', $matImp->id)->get();
        
        if(count($cuestionariomateria) > 0){
            foreach($cuestionariomateria as $cuesMat){
                $cuesMat->cuestionario = Cuestionario::where('id', $cuesMat->IDCUESTIONARIO)->first();
                //Para Averiguar cuales ya estan en uso por este cuestionario
                $cuesMat->cuestionario->categoriasCuestionarioEnUso = CategoriaCuestionario::where('IDCUESTIONARIO', $cuesMat->IDCUESTIONARIO)->get();
                //dd($cuesMat);
                if( count($cuesMat->cuestionario->categoriasCuestionarioEnUso) > 0 ){
                    $categoria_Uso = new Collection();
                    foreach($cuesMat->cuestionario->categoriasCuestionarioEnUso as $catCue){
                        $categoria_Uso->push(Categoria::find($catCue->IDCATEGORIA));
                    }
                    //Categorias que estan Asignadas
                    $cuesMat->cuestionario->categoria_Uso = $categoria_Uso;
                    //Categorias que no estan asignadas
                    $categoria_SinAsignar = new Collection();
                    $categoria_SinAsignar = $categorias->diff($cuesMat->cuestionario->categoria_Uso);
                    //dd($categoria_SinAsignar);
                    $cuesMat->cuestionario->categoria_SinAsignar = $categoria_SinAsignar;
                }
                
            }
            
        }
        
        //dd($cuestionariomateria);
        return view('cuestionario.index')->with('cuestionariomateria', $cuestionariomateria)->with('categorias',$categorias);

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

    public function asignarCategoriaPorcentaje($id){
        $idCuestionario = $id;
        $categoriaCuestionario = CategoriaCuestionario::where('IDCUESTIONARIO', $idCuestionario)->get();
        foreach($categoriaCuestionario as $catCue){
            $catCue->categoria = Categoria::find($catCue->IDCATEGORIA);
            $preguntas = Pregunta::where('IDCATEGORIA', $catCue->categoria->id)->get();
            $catCue->categoria->NumeroPregunta = count($preguntas);
        }
        $cuantos = count($categoriaCuestionario);
        $ultimo_categoria = $categoriaCuestionario->last();
        

        //dd($categoriaCuestionario);

        return view('cuestionario.asignarCategoriaPorcentaje')->with('categoriaCuestionario', $categoriaCuestionario)
                                                              ->with('idCuestionario', $idCuestionario)
                                                              ->with('cuantos', $cuantos)
                                                              ->with('ultimo_categoria', $ultimo_categoria);
    }

    public function guardarPorcentajes(Request $request){

    }

    public function guardarCategorias(Request $request){

        $categoriasEnviadas = new Collection();
        $categoriasYaSeleccionada = new Collection();
        //Eliminar
        $categoriasEliminar = new Collection();
        //Agregar
        $categoriasAgregar = new Collection();

        $categoriasCuestionario = CategoriaCuestionario::where('IDCUESTIONARIO', $request->idCuestionario)->get();
        if($categoriasCuestionario){
            foreach($categoriasCuestionario as $catCue){
                $categoriasYaSeleccionada->push(Categoria::find($catCue->IDCATEGORIA));
            }
        }
        if($request->categoriasSeleccionadas){
            foreach($request->categoriasSeleccionadas as $idCatSel){
                $categoriasEnviadas->push(Categoria::find($idCatSel));
            }
        }

        $categoriasAgregar = $categoriasEnviadas->diff($categoriasYaSeleccionada);
        $categoriasEliminar = $categoriasYaSeleccionada->diff($categoriasEnviadas);

        if(count($categoriasAgregar)>0){
            foreach($categoriasAgregar as $catAgrega){
                $categoriaCuestionario = new CategoriaCuestionario();
                $categoriaCuestionario->IDCUESTIONARIO = $request->idCuestionario;
                $categoriaCuestionario->IDCATEGORIA = $catAgrega->id;
                $categoriaCuestionario->save();
            }
            Flash::success("Categorias Agregadas con Exito");
        }
        if(count($categoriasEliminar)>0){
            foreach($categoriasEliminar as $catBorra){
                //dd($catBorra);
                $categoriaCuestionario = CategoriaCuestionario::where('IDCUESTIONARIO', $request->idCuestionario)->where('IDCATEGORIA', $catBorra->id)->first();
                $categoriaCuestionario->delete();
            }
            Flash::danger("Categorias Actualizadas con Exito");
        }

        return redirect()->route('cuestionarios.index');
        
    }


    
}
