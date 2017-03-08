<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'GRUPO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'IDDOCENTE',
        'IDTIPOGRUPO',
        'IDMATERIAIMPARTIDA',
        'CODIGOGRUPO',
        
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
    public function docentes()
    {
        return $this->hasMany('App\Docente');
    }
    public function tipoGrupos()
    {
        return $this->hasMany('App\TipoGrupo');
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
        return $this->belongsTo('App\Actividad');
    }
    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion');
    }
}
