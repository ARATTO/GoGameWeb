<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'PREGUNTA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDPREGUNTA',
        'IDCATEGORIA',
        'IDTIPOPREGUNTA',
        'PREGUNTA',
        
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
