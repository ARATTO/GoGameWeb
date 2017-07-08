<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    protected $table = 'coordinador';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDDOCENTE',
        'IDMATERIAIMPARTIDA',
        
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
    public function materiasImpartidas()
    {
        return $this->belongsTo('App\MateriaImpartida');
    }

    /**
    * Relaciones RETORNOS
    */
    
}
