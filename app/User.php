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
        'IDPERFIL',
        'IDESTUDIANTE',
        'IDDOCENTE',
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
        return $this->hasMany('App\Estudiante', 'IDESTUDIANTE');
    }
    public function docentes()
    {
        return $this->hasMany('App\Docente', 'IDDOCENTE');
    }

    /**
    * Relaciones RETORNOS
    */
    public function cuestionarioAsignado()
    {
        return $this->belongsTo('App\CuestionarioAsignado', 'IDPERFIL');
    }
    public function detallePuntoActividad()
    {
        return $this->belongsTo('App\DetallePuntoActividad', 'IDPERFIL');
    }
    public function medallaGanada()
    {
        return $this->belongsTo('App\MedallaGanada', 'IDPERFIL');
    }
}
