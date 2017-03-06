<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'DOCENTE';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDDOCENTE',
        'NOMBREDOCENTE',
        'CARNETDOCENTE',
        
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
        return $this->belongsTo('App\Grupo','IDDOCENTE');
    }
    public function user()
    {
        return $this->belongsTo('App\User','IDDOCENTE');
    }
    
}
