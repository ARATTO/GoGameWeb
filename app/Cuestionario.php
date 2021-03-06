<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'NOMBRECUESTIONARIO',
        'IDDOCENTE',
        'FECHAINICIOCUESTIONARIO',
        'FECHAFINCUESTIONARIO',
        'DURACIONCUESTIONARIO',
        
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
    public function docentes()
    {
        return $this->belongsTo('App\Docente');
    }

    /**
    * Relaciones RETORNOS
    */
    
    public function categoriaCuestionario()
    {
        return $this->hasMany('App\CategoriaCuestionario');
    }
    public function cuestionarioAsignado()
    {
        return $this->hasMany('App\CuestionarioAsignado');
    }
    public function cuestionarioMateria()
    {
        return $this->hasMany('App\CuestionarioMateria');
    }
}