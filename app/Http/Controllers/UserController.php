<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Docente;
use App\Ciclo;
use App\MateriaImpartida;
use App\Materia;
use App\Http\Requests;
use Image;
use Laracasts\Flash\Flash;

class UserController extends Controller
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
        $users = User::all();
        
        return view('user.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //Obtener las Materias impartidas en Este Ciclo
        $ciclo = Ciclo::where('ESTAACTIVOCICLO', 1)->first();
        $materiasImpartidas = MateriaImpartida::where('IDCICLO', $ciclo->id)->get();
        //Recorrer para Obtener las Materias
        $materiasImpartidas->each(function($materiasImpartidas){
            $materiasImpartidas->materia = Materia::find($materiasImpartidas->IDMATERIA);
        });

        //flash('Message', 'success');
        return view('user.crear')->with(['materiasImpartidas'=>$materiasImpartidas]);
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

        //Imagen
        if($request->file('fotoPerfil'))
        {
          $Foto = $request->file('fotoPerfil');
          $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/gogame/FotoPerfil";
          $Foto->move($path, $nombreFoto);
        }else{
          //Foto por Default
          $nombreFoto = '_PerfilDefault.png';
        }

        //Guardar Docente
        if($request->ESDOCENTE == 1){
            //Crea Docente
            $Docente = new Docente($request->all()); 
        }
        //Guardar Materia si es Coordinador
        if($request->ESCOORDINADOR == 1){
            //Comprobamos si la materia ya tiene Coordinador
            $matImp = MateriaImpartida::find($request->MATERIAIMPARTIDA);
            $coordinadorAll = Coordinador::all();
            $tieneCoor = false;
            foreach($coordinadorAll as $coor){
                if($coor->IDMATERIAIMPARTIDA == $matImp->id){
                    //Si ya tiene Coordinador 
                    $docenteCoor = Docente::find($coor->id);
                    $tieneCoor = true;
                }
            }
            //Si ya tiene Coordinador
            if($tieneCoor){
                //Quitarle Coordinacion a Docente anterior 
                $docenteCoor->ESCOORDINADOR = 0;
                $docenteCoor->save();
            }
            //Guardamos el Nuevo Docente como Coordinador
            $Docente->ESCOORDINADOR = 1;
            $Docente->save();
            //Guardamos el Coordinador con su materia
            $coordinador = new Coordinador($request->all());
            $coordinador->save();
        }else{
            //Sin o es Coordinador solo Guardamos el Docente
            $Docente->save();
        }

        $User = new User();
        //Extraemos Nombre
        $split = explode(" ", $request->NOMBREDOCENTE);
        $firstname = array_shift($split);
        //Credenciales de Usuario
        $User->NOMBREPERFIL = $firstname;
        //Correo Institucional modificable
        $User->email = $request->CARNETDOCENTE . trans('gogamessage.correoInstitucional');
        //El Pasword es el CARNET
        $User->password = bcrypt($request->CARNETDOCENTE);
        $User->IMAGENPERFIL = $nombreFoto;
        //Si es Administrador
        if($request->ESADMINISTRADOR == 1){
            $User->ESADMINISTRADOR = 1;
        }
        //Si es Docente
        if($request->ESDOCENTE == 1){
            $User->IDDOCENTE = $Docente->id;
        }
        $User->save();
        
        //flash('Usuario '.$User->NOMBREPERFIL.' creado con exito', 'success');
        Flash::info("Se ha registrado ".$User->NOMBREPERFIL." de forma exitosa");
        return redirect()->route('users.index');
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
        $user = User::find($id);

        return view('user.editar')->with(['user'=>$user]);
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

    /*
    *
    * Mis Funciones
    *
    */
    
    public function activar($id){

        $user = User::find($id);
        $user->ESACTIVO = 1;
        $user->save();

        Flash::success("Se ha ACTIVADO ".$user->NOMBREPERFIL." de forma exitosa");

        return redirect()->route('users.index');
    }

    public function inactivar($id){
        
        $user = User::find($id);
        $user->ESACTIVO = null;
        $user->save();

        Flash::danger("Se ha INACTIVADO ".$user->NOMBREPERFIL." de forma exitosa");

        return redirect()->route('users.index');

    }
}
