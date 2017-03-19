<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ciclo;
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
}
