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
        'IDGRUPO',
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
        return $this->hasMany('App\Docente','IDDOCENTE');
    }
    public function tipoGrupos()
    {
        return $this->hasMany('App\TipoGrupo','IDTIPOGRUPO');
    }
    public function materiasImpartidas()
    {
        return $this->hasMany('App\MateriaImpartida','IDMATERIAIMPARTIDA');
    }

    /**
    * Relaciones RETORNOS
    */
    public function actividad()
    {
        return $this->belongsTo('App\Actividad', 'IDGRUPO');
    }
    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion', 'IDGRUPO');
    }
}
