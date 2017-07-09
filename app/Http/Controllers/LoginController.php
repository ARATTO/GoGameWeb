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

<<<<<<< HEAD
            } elseif ($usuariojson->IDDOCENTE!=NULL){
                $numero=2;
                return $numero;
            } elseif ($usuariojson->IDADMINISTRADOR!=NULL){
                $numero=3;
=======
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
>>>>>>> 748a514b90ec585521ddb1589ac4ee41b9f01887
                return $numero;
            }
    
        }else {
            
            $numero=5;
            return $numero;
    
        }

        
        
    }

}
