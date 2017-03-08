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
        'id',
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
        return $this->hasMany('App\TipoPuntos');
    }
    public function materiasImpartidas()
    {
        return $this->hasMany('App\MateriaImpartida');
    }

    /**
    * Relaciones RETORNOS
    */
    public function actividad()
    {
        return $this->belongsTo('App\Actividad', 'IDDETALLEPUNTO');
    }
}
