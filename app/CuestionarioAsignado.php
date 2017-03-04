<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioAsignado extends Model
{
    protected $table = 'CUESTIONARIOASIGNADO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDCUESTIONARIOASIGNADO',
        'IDPERFIL',
        'IDCUESTIONARIO',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    /**
    * Eliminar timestamps del modelo
    */
    public $timestamps = false;
}