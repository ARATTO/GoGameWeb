<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePunto extends Model
{
    protected $table = 'detallepunto';
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
        return $this->belongsTo('App\TipoPuntos');
    }
    public function materiasImpartidas()
    {
        return $this->belongsTo('App\MateriaImpartida');
    }

    /**
    * Relaciones RETORNOS
    */
    public function actividad()
    {
        return $this->hasMany('App\Actividad', 'IDDETALLEPUNTO');
    }
}
