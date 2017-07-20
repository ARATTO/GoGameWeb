<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioAsignado extends Model
{
    protected $table = 'cuestionarioasignado';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDPERFIL',
        'IDCUESTIONARIO',
        'NOTAFINAL',
        
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
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function cuestionarios()
    {
        return $this->belongsTo('App\Cuestionario');
    }

    /**
    * Relaciones RETORNOS
    */
    public function opcionSeleccionada()
    {
        return $this->hasMany('App\OpcionSeleccionada');
    }
}