<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $table = 'CICLO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDCICLO',
        'CODIGOCICLO',
        'FECHAINICIO',
        'FECHAFIN',
        'ESTAACTIVOCICLO',
        
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
    
    public function materiaImpartida()
    {
        return $this->belongsTo('App\MateriaImpartida','IDCICLO');
    }
    
}