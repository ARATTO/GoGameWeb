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

    /**
    * Relaciones
    */
    public function cuestionariosAsignados()
    {
        return $this->hasMany('App\CuestionarioAsignado','IDCUESTIONARIOASIGNADO');
    }
    public function respuestas()
    {
        return $this->hasMany('App\Respuesta','IDRESPUESTA');
    }
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta','IDPREGUNTA');
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
