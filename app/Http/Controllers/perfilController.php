<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;

class perfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    public function buscarPerfil($correo){



        $perfil = User::where('email',$correo)->get()->toJson();

        $vector =  json_decode($perfil);


        foreach($vector as $v){
            
            try{
                $v->IMAGENPERFIL=  base64_encode( file_get_contents(public_path()."/gogame/FotoPerfil/".$v->IMAGENPERFIL));
            }catch(Exception $e) {
                error_log('error');
            }
        
           
        }
          

        return $vector;
    }

    public function obtenerMedallasPerfil($correo){
        $perfil = User::where('email',$correo)
        ->join('medallaganada','perfil.id','=','medallaganada.idperfil')
        ->join('detallemedalla','detallemedalla.id','=','medallaganada.iddetallemedalla')
        ->join('medalla','medalla.id','=','detallemedalla.idmedalla')
        ->get()->toJson();

        $vector = json_decode($perfil);

        foreach ($vector as $medalla) {
            
            $medalla->IMAGENMEDALLA = base64_encode(file_get_contents(public_path()."/gogame/FotoMedalla/".$medalla->IMAGENMEDALLA));


        }

        $medallas = json_encode($vector);


        return $medallas;
    }


}
