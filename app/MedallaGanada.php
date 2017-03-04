<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedallaGanada extends Model
{
    protected $table = 'MEDALLAGANADA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDMEDALLAGANADA',
        'IDMEDALLA',
        'IDPERFIL',
        
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
