<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'PERFIL';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDPERFIL',
        'IDESTUDIANTE',
        'IDDOCENTE',
        'NOMBREPERFIL',
        'IMAGENPERFIL',
        'DESCRIPCIONPERFIL',
        'APODO',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD',
        'remember_token',
    ];
}
