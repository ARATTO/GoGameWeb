<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePunto extends Model
{
    protected $table = 'DETALLEPUNTO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDDETALLEPUNTO',
        'IDTIPOPUNTO',
        'IDMATERIAIMPARTIDA',
        'ESTAACTIVOPUNTO',
        'PUNTOSACTIVIDAD',
        
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
