<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPunto extends Model
{
    protected $table = 'TIPOPUNTO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'NOMBREPARAMETRO',
        
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
    public function detallePunto()
    {
        return $this->hasMany('App\DetallePunto');
    }
}
