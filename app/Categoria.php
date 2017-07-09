<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDMATERIAIMPARTIDA',
        'NOMBRECATEGORIA',
        'DESCRIPCIONCATEGORIA',
        
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
    
    public function materiasImpartidas()
    {
        return $this->hasMany('App\MateriaImpartida');
    }
    

    /**
    * Relaciones RETORNOS
    */
    
    public function categoriaCuestionario()
    {
        return $this->hasMany('App\CategoriaCuestionario');
    }
    public function pregunta()
    {
        return $this->hasMany('App\Pregunta');
    }
    
}