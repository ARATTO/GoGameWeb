<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePuntoActividad extends Model
{
    protected $table = 'DETALLEPUNTOACTIVIDAD';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDDETALLEPUNTOACTIVIDAD',
        'IDPERFIL',
        'IDACTIVIDAD',
        'PUNTAJEGANADO',
        
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
    public function users()
    {
        return $this->hasMany('App\User', 'IDPERFIL');
    }
    public function actividades()
    {
        return $this->hasMany('App\Actividad', 'IDACTIVIDAD');
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
