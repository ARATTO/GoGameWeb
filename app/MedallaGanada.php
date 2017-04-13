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
        'IDDETALLEMEDALLA',
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
    public function detalleMedallas()
    {
        return $this->belongsTo('App\DetalleMedalla');
    }
    public function users()
    {
        return $this->belognsTo('App\User');
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
