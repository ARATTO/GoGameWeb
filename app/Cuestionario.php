<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'CUESTIONARIO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDCUESTIONARIO',
        'IDDOCENTE',
        'FECHACUESTIONARIO',
        'HORAINICIOCUESTIONARIO',
        'HORAFINCUESTIONARIO',
        'DURACIONCUESTIONARIO',
        
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