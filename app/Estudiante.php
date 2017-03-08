<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'ESTUDIANTE';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'NOMBREESTUDIANTE',
        'CARNETESTUDIANTE',
        
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
    /*
    public function _s()
    {
        return $this->hasMany('App\_');
    }
    */

    /**
    * Relaciones RETORNOS
    */
    
    public function inscripcion()
    {
        return $this->belongsTo('App\Inscripcion');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
