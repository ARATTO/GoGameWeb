<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;


class LoginController extends Controller
{
    public function store(Request $request)
    {

        $usuario = User::Where('email', $request->email)->get()->toJson();

        if($usuario!=null){

            $usuariojson=json_decode($usuario);
        
            if(\Hash::check($request->password ,$usuariojson[0]->password)){

                if($usuariojson[0]->IDESTUDIANTE!=NULL){
                    
                    $numero=1;
                    return $numero;

                } elseif ($usuariojson[0]->IDDOCENTE!=NULL){

                    $numero=2;
                    return $numero;

                } else {

                    $numero=3;
                    return $numero;

                }
            
            }else {

                $numero=4;
                return $numero;
            }
    
        }else {
            
            $numero=5;
            return $numero;
    
        }

        
        
    }

}
