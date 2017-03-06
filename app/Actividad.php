<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'ACTIVIDAD';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDACTIVIDAD',
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
        return $this->hasMany('App\TipoActividad', 'IDTIPOACTIVIDAD');
    }
    public function detallePuntos()
    {
        return $this->hasMany('App\DetallePunto', 'IDDETALLEPUNTO');
    }
    public function grupos()
    {
        return $this->hasMany('App\Grupo', 'IDGRUPO');
    }

    /**
    * Relaciones RETORNOS
    */

    public function detallePuntoActividad()
    {
        return $this->belongsTo('App\DetallePuntoActividad','IDACTIVIDAD');
    }
    
}
