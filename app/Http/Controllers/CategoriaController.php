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
use App\Pregunta;
use App\Respuesta;
use App\TipoPregunta;
use App\CategoriaCuestionario;

use Illuminate\Support\Facades\Cache;
use Laracasts\Flash\Flash;
use Storage;
use Excel;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matImp = new MateriaImpartida();
        $matImp = $this->buscarMateriaImpartida();

        $categorias = Categoria::where('IDMATERIAIMPARTIDA', $matImp->id)->get();

        foreach($categorias as $cat){
            $categoriaCuestionario = CategoriaCuestionario::where('IDCATEGORIA', $cat->id)->first();
            if(count($categoriaCuestionario) > 0){
                $cat->EnUso = 1;
            }else{
                $cat->EnUso = 0;
            }
        }
        
        return view('categoria.index')->with('categorias', $categorias)->with('materia', $matImp->materia->NOMBREMATERIA);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.crear');
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

        $matImp = new MateriaImpartida();
        $matImp = $this->buscarMateriaImpartida();

        $categoria = new Categoria();
        $categoria->IDMATERIAIMPARTIDA = $matImp->id;
        $categoria->fill($request->all());

        $categoria->save();

        return redirect()->route('categorias.index');

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
        $categoria = Categoria::find($id);

        return view('categoria.editar')->with(['categoria'=>$categoria]);
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
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        Flash::warning("Se ha EDITADO ".$categoria->NOMBRECATEGORIA." de forma exitosa");
        return redirect()->route('categorias.index');
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

    public function eliminarCategoria($id)
    {
        $categoria = Categoria::find($id);
        $preguntas = Pregunta::where('IDCATEGORIA', $categoria->id)->get();
        foreach($preguntas as $pregunta){
            $respuestas = Respuesta::where('IDPREGUNTA', $pregunta->id)->get();
            foreach($respuestas as $respuesta){
                $respuesta->delete();
            }
            $pregunta->delete();
        }
        $categoria->delete();
        
        Flash::info("Categoria Eliminada de forma exitosa");
        return redirect()->route('categorias.index');
    }

    public function importarPreguntas(Request $request, $id){
        //Guardar Grupo a tratar
	    Cache::put('idCategoria', $id , 5); // 5 Minutos que esta en Cache

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
                $idCategoria = Cache::get('idCategoria');
                //Recorre cada fila de la hoja
                foreach ($result as $fila) {

                    //Si la pregunta o la respuesta correcta estan vacios ...
                    if($fila->pregunta != "" || $fila->respuesta != ""){
                        
                        //Obtener Tipo de Pregunta
                        $tipoPregunta = TipoPregunta::find(1); //1 Es Opcion Multiple*/
                        //COMPROBAR SI LA PREGUNTA A INSERTAR, YA EXISTE PARA LA CATEGORIA
                        $preguntasCategoria = DB::table('CATEGORIA')
                            ->join('PREGUNTA', 'PREGUNTA.IDCATEGORIA', '=', 'CATEGORIA.id')
                            ->where('CATEGORIA.id', $idCategoria)
                            ->where('PREGUNTA.PREGUNTA', $fila->pregunta)
                            ->get();

                        if(count($preguntasCategoria) == 0){

                            //Creamos Pregunta
                            $pregunta = new Pregunta();
                            $pregunta->IDCATEGORIA = $idCategoria;
                            $pregunta->IDTIPOPREGUNTA = $tipoPregunta->id;
                            $pregunta->PREGUNTA = $fila->pregunta;
                            $pregunta->save();

                            //Crear Respuesta Correcta
                            $respuesta = new Respuesta();
                            $respuesta->IDPREGUNTA = $pregunta->id;
                            $respuesta->ESCORRECTA = 1;
                            $respuesta->ALTERNATIVA = $fila->respuesta;
                            $respuesta->save();

                            if($fila->opcion1 != ""){
                                //Crear Respuesta Erronea
                                $respuesta = new Respuesta();
                                $respuesta->IDPREGUNTA = $pregunta->id;
                                $respuesta->ESCORRECTA = 0;
                                $respuesta->ALTERNATIVA = $fila->opcion1;
                                $respuesta->save();
                            }
                            if($fila->opcion2 != ""){
                                //Crear Respuesta Erronea
                                $respuesta = new Respuesta();
                                $respuesta->IDPREGUNTA = $pregunta->id;
                                $respuesta->ESCORRECTA = 0;
                                $respuesta->ALTERNATIVA = $fila->opcion2;
                                $respuesta->save();
                            }
                            if($fila->opcion3 != ""){
                                //Crear Respuesta Erronea
                                $respuesta = new Respuesta();
                                $respuesta->IDPREGUNTA = $pregunta->id;
                                $respuesta->ESCORRECTA = 0;
                                $respuesta->ALTERNATIVA = $fila->opcion3;
                                $respuesta->save();
                            }

                        }//fIN cOUNT cALIDACION PARA REPETIR PREGUNTAS
                        
                    }else{
                        /*
                        // Tiene Filas con campos Vacios
                        */
                    }
                //Se cierra ForEach
                }
            //Se Cierra Funcion Excel
			})->get();

			Flash::info("Se han cargado las Preguntas de forma exitosa");
		    return redirect()->route('preguntas.verPreguntas', $id);
       }
       else
       {
			Flash::error("Se producido un error al momento de importar el archivo");
			return redirect()->route('categorias.index');
       }
    }

    public function buscarMateriaImpartida(){
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
                $matImp->materia = Materia::find($coor->materiaImpartida->IDMATERIA);
            }
        }

        return $matImp;
    }
    
}
