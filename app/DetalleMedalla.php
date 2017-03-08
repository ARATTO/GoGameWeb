<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMedalla extends Model
{
    protected $table = 'DETALLEMEDALLA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDMATERIA',
        'IDMEDALLA',
        'CANTIDADMINIMAPUNTOS',
        
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
    public function materias()
    {
        return $this->hasMany('App\Materia');
    }
    public function medallas()
    {
        return $this->hasMany('App\Medalla');
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
