<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Materia;
use Laracasts\Flash\Flash;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::all();

        return view('materia.index')->with(['materias'=>$materias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materia.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Imagen
        if($request->file('imgMateria'))
        {
          $Foto = $request->file('imgMateria');
          $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/gogame/FotoMateria";
          $Foto->move($path, $nombreFoto);
        }else{
          //Foto por Default
          $nombreFoto = '_MateriaDefault.png';
        }

        //Crear Materia
        $materia = new Materia();

        
        
        $materia->CODIGOMATERIA = $request->CODIGOMATERIA;
        $materia->NOMBREMATERIA = $request->NOMBREMATERIA;
        if($request->ESTECNICAELECTIVA == 1){
            $materia->ESTECNICAELECTIVA = 1;
        }
        $materia->IMAGENMATERIA = $nombreFoto;
        
        $materia->save();

        Flash::info("Se ha registrado ".$materia->CODIGOMATERIA.": ".$materia->NOMBREMATERIA." de forma exitosa");
        return redirect()->route('materias.index');
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
        $materia = Materia::find($id);

        return view('materia.editar')->with(['materia'=>$materia]);
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
        $materia = Materia::find($id);

        $Fvieja = $materia->IMAGENMATERIA;

        $materia->fill($request->all());

        if($request->file('imgMateria') != null)
        {
          $Foto = $request->file('imgMateria');
          $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/gogame/FotoMateria";
          $Foto->move($path, $nombreFoto);
          //Borrar archivo viejo si no es Default
          $rutaF = $path."/".$Fvieja; //Borra archivo viejo
          if(file_exists($rutaF) & $Fvieja != "_MateriaDefault.png"){
              unlink($rutaF); //Borra archivo de foto
          }
          //Guardar Nueva Imagen
          $materia->IMAGENMATERIA = $nombreFoto;
        }else{
          $materia->IMAGENMATERIA = $Fvieja; //Guarda vieja foto
        }
        $materia->save();

        Flash::warning("Se ha EDITADO  de forma exitosa ".$materia->CODIGOMATERIA.": ".$materia->NOMBREMATERIA);
        return redirect()->route('materias.index');
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
