<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionSeleccionada extends Model
{
    protected $table = 'OPCIONSELECCIONADA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDOPCIONSELECCIONADA',
        'IDCUESTIONARIOASIGNADO',
        'IDRESPUESTA',
        'IDPREGUNTA',
        
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
