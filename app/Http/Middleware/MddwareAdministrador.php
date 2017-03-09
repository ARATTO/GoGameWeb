<?php

namespace App\Http\Middleware;

use Closure;

class MddwareAdministrador {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //dd($request->user());
        switch ($request->user()->ESADMINISTRADOR) { //Mddwr para Administrador = 1 entonces es Administrador

            case 1: 
                return $next($request);
                break;

            default :
                abort(401);
        }
    }
}