<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCuestionario extends Model
{
    protected $table = 'categoriacuestionario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDCUESTIONARIO',
        'IDCATEGORIA',
        'CANTIDADPREGUNTAS',
        'PORCENTAJECATEGORIA',
        
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
    public function cuestionarios()
    {
        return $this->belongsTo('App\Cuestionario');
    }
    public function categorias()
    {
        return $this->belongsTo('App\Categoria');
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