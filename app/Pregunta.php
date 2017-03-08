<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'PREGUNTA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDCATEGORIA',
        'IDTIPOPREGUNTA',
        'PREGUNTA',
        
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
    public function categorias()
    {
        return $this->hasMany('App\Categoria');
    }
    public function tipoPreguntas()
    {
        return $this->hasMany('App\TipoPregunta');
    }

    /**
    * Relaciones RETORNOS
    */
    public function opcionSeleccionada()
    {
        return $this->belongsTo('App\OpcionSeleccionada');
    }
    public function respuesta()
    {
        return $this->belongsTo('App\Respuesta');
    }
}
