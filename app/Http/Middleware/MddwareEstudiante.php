<?php

namespace App\Http\Middleware;

use Closure;

class MddwareEstudiante {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
        if( !is_null($request->user()->IDESTUDIANTE) )  { //Mddwr para IDESTUDIANTE != NULL entonces es Estudiante
            session()->put('estudiante', 'estudiante');
            return $next($request);
        }else {
            session()->put('estudiante', '');
            abort(401);
        }

    }

}