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
        return $this->belongsTo('App\Categoria');
    }
    public function tipoPreguntas()
    {
        return $this->belongsTo('App\TipoPregunta');
    }

    /**
    * Relaciones RETORNOS
    */
    public function opcionSeleccionada()
    {
        return $this->hasMany('App\OpcionSeleccionada');
    }
    public function respuesta()
    {
        return $this->hasMany('App\Respuesta');
    }
}
