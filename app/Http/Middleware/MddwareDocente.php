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
        if( !is_null($request->user()->IDDOCENTE) )  { //Mddwr para IDDocente != NULL entonces es Docente
            session()->put('docente', 'docente');
            return $next($request);
        }else {
            session()->put('docente', '');
            abort(401);
        }

    }

}