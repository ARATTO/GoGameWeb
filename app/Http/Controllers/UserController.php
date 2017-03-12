<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Docente;
use App\Http\Requests;
use Intervention\Image\Facades\Image as Image;

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
        //dd($users);
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
        //dd($request->all());

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
        if($request->ESADMINISTRADOR == 1){
            $User->ESADMINISTRADOR = 1;
        }
        if($request->ESDOCENTE == 1){
            $User->IDDOCENTE = $Docente->id;
        }

        // resize image
        $big_image = Image::make(Input::file($request->file)->getRealPath())->resize(870, null, true, false);
        $User->IMAGENPERFIL = $big_image;

        dd($User);
        


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
