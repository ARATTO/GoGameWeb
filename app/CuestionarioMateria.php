<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioMateria extends Model
{
    protected $table = 'CUESTIONARIOMATERIA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDMATERIAIMPARTIDA',
        'IDCUESTIONARIO',
        
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
    public function cuestionarios()
    {
        return $this->hasMany('App\Cuestionario');
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
