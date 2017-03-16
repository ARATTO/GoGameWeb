<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Docente;
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

        //flash('Message', 'success');
        return view('user.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->file);

        //Imagen
        if($request->file('fotoPerfil'))
        {
          $Foto = $request->file('fotoPerfil');
          $nombreFoto = 'gogame' . time() . '.' . $Foto->getClientOriginalExtension();
          $path = public_path() . "/gogame/FotoPerfil";
          $Foto->move($path, $nombreFoto);
        }else{
          //Foto por Default
          $nombreFoto = 'GGLogo.png';
        }

        //Guardar Docente
        if($request->ESDOCENTE == 1){
            $Docente = new Docente($request->all());
            $Docente->save();    
        }

        $User = new User();

        $split = explode(" ", $request->NOMBREDOCENTE);
        $firstname = array_shift($split);
        
        $User->NOMBREPERFIL = $firstname;
        $User->email = $request->CARNETDOCENTE . trans('gogamessage.correoInstitucional');
        $User->password = bcrypt($request->CARNETDOCENTE);
        $User->IMAGENPERFIL = $nombreFoto;
        if($request->ESADMINISTRADOR == 1){
            $User->ESADMINISTRADOR = 1;
        }
        if($request->ESDOCENTE == 1){
            $User->IDDOCENTE = $Docente->id;
        }

        $User->save();


        /*
        // resize image
        // open an image file
        $img = Image::make('/media/motto/ERGO/GIT/GoGameWeb/public/gogame/images/los_eternos_mini.jpg');

        // now you are able to resize the instance
        //$img->resize(320, 240);
        $img->save('/media/motto/ERGO/GIT/GoGameWeb/public/gogame/images/los_eternos_mini.jpg');

        //$big_image = Image::make(Input::file('public/gogame/images/l_ejpg.jpg')->getRealPath())->resize(870, null, true, false);
        $User->IMAGENPERFIL = $img;

        
        //dd($User);
        */
        
        //flash('Usuario '.$User->NOMBREPERFIL.' creado con exito', 'success');
        Flash::info("Se ha registrado ".$User->NOMBREPERFIL." de forma exitosa");

        //dd($request);

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
