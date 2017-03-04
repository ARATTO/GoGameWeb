<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medalla extends Model
{
    protected $table = 'MEDALLA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDMEDALLA',
        'NOMBREMEDALLA',
        'DESCRIPCIONMEDALLA',
        'ESCUANTITATIVA',
        'IMAGENMEDALLA',
        
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
