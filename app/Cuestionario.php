<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'CUESTIONARIO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDDOCENTE',
        'FECHACUESTIONARIO',
        'HORAINICIOCUESTIONARIO',
        'HORAFINCUESTIONARIO',
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
        return $this->hasMany('App\Docente');
    }

    /**
    * Relaciones RETORNOS
    */
    
    public function categoriaCuestionario()
    {
        return $this->belongsTo('App\CategoriaCuestionario');
    }
    public function cuestionarioAsignado()
    {
        return $this->belongsTo('App\CuestionarioAsignado');
    }
    public function cuestionarioMateria()
    {
        return $this->belongsTo('App\CuestionarioMateria');
    }
}