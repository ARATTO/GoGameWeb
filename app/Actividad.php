<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDTIPOACTIVIDAD',
        'IDDETALLEPUNTO',
        'IDGRUPO',
        'NOMBREACTIVIDAD',
        
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
    public function tipoActividades()
    {
        return $this->belongsTo('App\TipoActividad');
    }
    public function detallePuntos()
    {
        return $this->belongsTo('App\DetallePunto');
    }
    public function grupos()
    {
        return $this->belongsTo('App\Grupo');
    }

    /**
    * Relaciones RETORNOS
    */

    public function detallePuntoActividad()
    {
        return $this->hasMany('App\DetallePuntoActividad');
    }
    
}
