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
        'id',
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
        return $this->belongsTo('App\CuestionarioAsignado');
    }
    public function respuestas()
    {
        return $this->belongsTo('App\Respuesta');
    }
    public function preguntas()
    {
        return $this->belongsTo('App\Pregunta');
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
