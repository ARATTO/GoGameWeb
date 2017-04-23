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
        if($request->user()->ESADMINISTRADOR == 1) { //Mddwr para Administrador = 1 entonces es Administrador
            session()->put('admin', 'admin');
            return $next($request);
        }else{
            session()->put('admin', '');
            abort(401);
        }
    }
}