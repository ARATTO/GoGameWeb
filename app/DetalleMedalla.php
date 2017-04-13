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
        'IDMATERIAIMPARTIDA',
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
    public function materiasImpartidas()
    {
        return $this->belongsTo('App\MateriaImpartida');
    }
    public function medallas()
    {
        return $this->belongsTo('App\Medalla');
    }

    /**
    * Relaciones RETORNOS
    */
    
    public function medallaGanada()
    {
        return $this->hasMany('App\MedallaGanada');
    }
    
}
