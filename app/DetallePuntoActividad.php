<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePuntoActividad extends Model
{
    protected $table = 'detallepuntoactividad';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
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
        return $this->belongsTo('App\User');
    }
    public function actividades()
    {
        return $this->belongsTo('App\Actividad');
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
