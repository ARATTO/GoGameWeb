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
        'id',
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

    /**
    * Relaciones
    */
    /*
    public function _s()
    {
        return $this->hasMany('App\_');
    }
    */

    /**
    * Relaciones RETORNOS
    */
    public function detalleMedalla()
    {
        return $this->hasMany('App\DetalleMedalla');
    }
    public function medallaGanada()
    {
        return $this->hasMany('App\MedallaGanada');
    }
}
