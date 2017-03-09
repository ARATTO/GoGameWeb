<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'PERFIL';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDESTUDIANTE',
        'IDDOCENTE',
        'ESADMINISTRADOR',
        'NOMBREPERFIL',
        'EMAIL',
        'IMAGENPERFIL',
        'DESCRIPCIONPERFIL',
        'APODO',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD',
        'remember_token',
    ];

    /**
    * Eliminar timestamps del modelo
    */
    public $timestamps = false;

    /**
    * Relaciones
    */
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante');
    }
    public function docentes()
    {
        return $this->hasMany('App\Docente');
    }

    /**
    * Relaciones RETORNOS
    */
    public function cuestionarioAsignado()
    {
        return $this->belongsTo('App\CuestionarioAsignado');
    }
    public function detallePuntoActividad()
    {
        return $this->belongsTo('App\DetallePuntoActividad');
    }
    public function medallaGanada()
    {
        return $this->belongsTo('App\MedallaGanada');
    }
}
