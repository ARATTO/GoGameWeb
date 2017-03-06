<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioAsignado extends Model
{
    protected $table = 'CUESTIONARIOASIGNADO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDCUESTIONARIOASIGNADO',
        'IDPERFIL',
        'IDCUESTIONARIO',
        
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
        return $this->hasMany('App\User', 'IDPERFIL');
    }
    public function cuestionarios()
    {
        return $this->hasMany('App\Cuestionario', 'IDCUESTIONARIO');
    }

    /**
    * Relaciones RETORNOS
    */
    public function opcionSeleccionada()
    {
        return $this->belongsTo('App\OpcionSeleccionada','IDCUESTIONARIOASIGNADO');
    }
}