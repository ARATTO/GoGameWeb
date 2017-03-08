<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'RESPUESTA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDPREGUNTA',
        'ESCORRECTA',
        'ALTERNATIVA',
        
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
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }

    /**
    * Relaciones RETORNOS
    */
    public function opcionSeleccionada()
    {
        return $this->belongsTo('App\OpcionSeleccionada');
    }
}
