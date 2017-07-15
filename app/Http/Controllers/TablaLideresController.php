<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class TablaLideresController extends Controller
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
    public function store()
    {
        $idmateria=1;//$request->Materia;
        $idgrupo=1;//$request->Grupo;
        $cadena1="select perfil.nombreperfil,sum(detallepuntoactividad.puntajeganado) 
        as puntajeacumulado from detallepuntoactividad inner join perfil on 
        perfil.id=detallepuntoactividad.idperfil where perfil.id in 
        (select distinct perfil.id from detallepuntoactividad inner join actividad on 
        actividad.id=detallepuntoactividad.idactividad   
        inner join grupo on actividad.idgrupo=grupo.id inner join inscripcion on 
        inscripcion.idgrupo=grupo.id inner join materiaimpartida on 
        materiaimpartida.id=grupo.idmateriaimpartida inner join materia on 
        materiaimpartida.idmateria=materia.id inner join perfil on
        detallepuntoactividad.idperfil=perfil.id ";
        $cadena2=" where perfil.idestudiante 
        is not null and materia.id=".$idmateria." and grupo.id=".$idgrupo.") 
        group by perfil.nombreperfil order by puntajeacumulado desc;";
        $resultado=$cadena1.$cadena2;
        //dd($resultado);
        $lideres = DB::select(DB::raw($resultado));

        $final = json_encode( $lideres);
        return $final;
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
