<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaImpartida extends Model
{
    protected $table = 'MATERIAIMPARTIDA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDMATERIAIMPARTIDA',
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
        return $this->hasMany('App\Ciclo','IDCICLO');
    }
    public function materias()
    {
        return $this->hasMany('App\Materia','IDMATERIA');
    }  
    

    /**
    * Relaciones RETORNOS
    */
    public function cuestionarioMateria()
    {
        return $this->belongsTo('App\CuestionarioMateria', 'IDMATERIAIMPARTIDA');
    }
    public function detallePunto()
    {
        return $this->belongsTo('App\DetallePunto', 'IDMATERIAIMPARTIDA');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Grupo', 'IDMATERIAIMPARTIDA');
    }
}
