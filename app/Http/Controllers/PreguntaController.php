<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

use Laracasts\Flash\Flash;
use DB;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function verPreguntas($id){
        
        $categoria = Categoria::find($id);

        $preguntasCategoria = DB::table('CATEGORIA')
                            ->join('PREGUNTA', 'PREGUNTA.IDCATEGORIA', '=', 'CATEGORIA.id')
                            ->where('CATEGORIA.id', $id)
                            ->select('PREGUNTA.PREGUNTA', 'PREGUNTA.id')
                            ->get();
        

        return view('pregunta.verPreguntas')->with('preguntasCategoria', $preguntasCategoria)
                                            ->with('categoria', $categoria);
    }

    public function borrarPregunta($id){
        $pregunta = Pregunta::find($id);
        $idcategoria = $pregunta->IDCATEGORIA;

        $respuestas = Respuesta::where('IDPREGUNTA', $pregunta->id)->get();
        
        foreach($respuestas as $respuesta){
            $respuesta->delete();
        }
        $pregunta->delete();
        //// Ver Preguntas
        $categoria = Categoria::find($idcategoria);

        $preguntasCategoria = DB::table('CATEGORIA')
                            ->join('PREGUNTA', 'PREGUNTA.IDCATEGORIA', '=', 'CATEGORIA.id')
                            ->where('CATEGORIA.id', $idcategoria)
                            ->select('PREGUNTA.PREGUNTA', 'PREGUNTA.id')
                            ->get();
        
        Flash::info("Pregunta Eliminada de forma exitosa");
        return view('pregunta.verPreguntas')->with('preguntasCategoria', $preguntasCategoria)
                                            ->with('categoria', $categoria);
        
    }
}
