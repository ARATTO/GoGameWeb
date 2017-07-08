<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';
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
        return $this->belongsTo('App\Docente');
    }
    public function tipoGrupos()
    {
        return $this->belongsTo('App\TipoGrupo');
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
        return $this->hasMany('App\Actividad');
    }
    public function inscripcion()
    {
        return $this->hasMany('App\Inscripcion');
    }
}
