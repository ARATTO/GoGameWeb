<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'MATERIA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDMATERIA',
        'CODIGOMATERIA',
        'NOMBREMATERIA',
        'ESTECNICAELECTIVA',
        'IMAGENMATERIA',
        
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
    public function detalleMedalla()
    {
        return $this->belongsTo('App\DetalleMedalla', 'IDMATERIA');
    }
    public function materiaImpartida()
    {
        return $this->belongsTo('App\MateriaImpartida', 'IDMATERIA');
    }
}
