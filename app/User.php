<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'perfil';
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
        'ESACTIVO',
        'NOMBREPERFIL',
        'email',
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
        'password',
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
        return $this->belongsTo('App\Estudiante');
    }
    public function docentes()
    {
        return $this->belongsTo('App\Docente');
    }

    /**
    * Relaciones RETORNOS
    */
    public function cuestionarioAsignado()
    {
        return $this->hasMany('App\CuestionarioAsignado');
    }
    public function detallePuntoActividad()
    {
        return $this->hasMany('App\DetallePuntoActividad');
    }
    public function medallaGanada()
    {
        return $this->hasMany('App\MedallaGanada');
    }
}
