<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'CATEGORIA';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDCATEGORIA',
        'NOMBRECATEGORIA',
        
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
    /*
    public function _s()
    {
        return $this->hasMany('App\_');
    }
    */

    /**
    * Relaciones RETORNOS
    */
    
    public function categoriaCuestionario()
    {
        return $this->belongsTo('App\CategoriaCuestionario', 'IDCATEGORIA');
    }
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta', 'IDCATEGORIA');
    }
    
}