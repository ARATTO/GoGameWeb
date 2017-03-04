<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaImpartida extends Model
{
    protected $table = 'MATERIAIMPARTIDA';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDMATERIAIMPARTIDA',
        'IDCICLO',
        'IDMATERIA',
        
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
}
