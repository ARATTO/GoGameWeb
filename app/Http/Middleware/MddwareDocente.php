<?php

namespace App\Http\Middleware;

use Closure;

class MddwareDocente {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        /*
        switch ($request->user()->tipoUsuario()) { //Mddwr para Docente
            case 1: //Se debe quitar
                return $next($request);
                break;
            case 2:
                return $next($request);
                break;
            case 3:
                return $next($request);
                break;
            case 4:
                return $next($request);
                break;
            case 5:
                return $next($request);
                break;
            case 7:
                return $next($request);
                break;
            default :
                abort(401);
        }
        */
    }

}