<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePunto extends Model
{
    protected $table = 'DETALLEPUNTO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDDETALLEPUNTO',
        'IDTIPOPUNTO',
        'IDMATERIAIMPARTIDA',
        'ESTAACTIVOPUNTO',
        'PUNTOSACTIVIDAD',
        
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
    public function tipoPuntos()
    {
        return $this->hasMany('App\TipoPuntos', 'IDTIPOPUNTO');
    }
    public function materiasImpartidas()
    {
        return $this->hasMany('App\MateriaImpartida', 'IDMATERIAIMPARTIDA');
    }

    /**
    * Relaciones RETORNOS
    */
    public function actividad()
    {
        return $this->belongsTo('App\Actividad', 'IDDETALLEPUNTO');
    }
}
