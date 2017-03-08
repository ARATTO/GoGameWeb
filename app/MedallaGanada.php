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
        'id',
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

    /**
    * Relaciones
    */
    public function medallas()
    {
        return $this->hasMany('App\Medalla');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
    * Relaciones RETORNOS
    */
    /*
    public function _()
    {
        return $this->belongsTo('App\_');
    }
    */
}
