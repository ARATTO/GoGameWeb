<?php

namespace App\Http\Middleware;

use Closure;
use App\Coordinador;
use App\Docente;

class MddwareCoordinador {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $coordinadorAll = Coordinador::all();
        $EsCoor = false;
        foreach($coordinadorAll as $coordinador){
            if($coordinador->IDDOCENTE == $request->user()->IDDOCENTE){
                $docente = Docente::find($request->user()->IDDOCENTE);
                if($docente->ESCOORDINADOR == 1){
                    $EsCoor = true;
                }
            }
        }   

        if( $EsCoor )  { //Mddwr para Coordinador if() ESCOORDINADOR == 1 
            session()->put('coordinador', 'coordinador');
            return $next($request);
        }else {
            session()->put('coordinador', '');
            abort(401);
        }

    }

}