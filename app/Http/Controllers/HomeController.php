<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use Auth;

use App\Coordinador;
use App\Docente;
use App\Http\Requests;
use Illuminate\Http\Request;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        //dd( decrypt('$2y$10$qagCWSMBFxw7XUidRwPvpuk1n2WKd2Yh4nICX3eFhwLZhrpFTlgKy') );
        //dd( bcrypt('aa14010') );
        
        /*
        //Guardar tipo de Rol
        */

        //Administrador
        if(Auth::user()->ESADMINISTRADOR == 1){
            session()->put('admin', 'admin');
        }
        //Coordinador
        $coordinadorAll = Coordinador::all();
        foreach($coordinadorAll as $coordinador){
            if($coordinador->IDDOCENTE == Auth::user()->IDDOCENTE){
                $docente = Docente::find(Auth::user()->IDDOCENTE);
                if($docente->ESCOORDINADOR == 1){
                    session()->put('coordinador', 'coordinador');
                }
            }
        }
        //Docente
        if( !is_null(Auth::user()->IDDOCENTE) ){
            session()->put('docente', 'docente');
        }
        //Estudiante
        if( !is_null(Auth::user()->IDESTUDIANTE) ){
            session()->put('estudiante', 'estudiante');
        }
        /*
        // SE DEBE PONER UN session()->flush() en el "Logout"
        */
        return view('home');
    }
}