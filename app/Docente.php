<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docente';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'NOMBREDOCENTE',
        'CARNETDOCENTE',
        'ESCOORDINADOR',
        
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
    
    public function grupo()
    {
        return $this->hasMany('App\Grupo');
    }
    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function coordinador()
    {
        return $this->hasMany('App\Coordinador');
    }
    
}
