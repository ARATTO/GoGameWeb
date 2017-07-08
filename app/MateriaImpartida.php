<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaImpartida extends Model
{
    protected $table = 'materiaimpartida';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDCICLO',
        'IDMATERIA',
        
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
    
    public function ciclos()
    {
        return $this->belongsTo('App\Ciclo');
    }
    public function materias()
    {
        return $this->belongsTo('App\Materia');
    }  
    

    /**
    * Relaciones RETORNOS
    */
    public function cuestionarioMateria()
    {
        return $this->hasMany('App\CuestionarioMateria', 'IDMATERIAIMPARTIDA');
    }
    public function detallePunto()
    {
        return $this->hasMany('App\DetallePunto', 'IDMATERIAIMPARTIDA');
    }
    public function grupo()
    {
        return $this->hasMany('App\Grupo', 'IDMATERIAIMPARTIDA');
    }
    public function coordinador()
    {
        return $this->hasMany('App\Coordinador');
    }
    public function detalleMedalla()
    {
        return $this->hasMany('App\DetalleMedalla');
    }
}
