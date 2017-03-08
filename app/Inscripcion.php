<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'INSCRIPCION';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDESTUDIANTE',
        'IDGRUPO',
        
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
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante');
    }
    public function grupos()
    {
        return $this->hasMany('App\Grupo');
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
