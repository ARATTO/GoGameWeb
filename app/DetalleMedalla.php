<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMedalla extends Model
{
    protected $table = 'DETALLEMEDALLA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDDETALLEMEDALLA',
        'IDMATERIA',
        'IDMEDALLA',
        'CANTIDADMINIMAPUNTOS',
        
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
