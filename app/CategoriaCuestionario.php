<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCuestionario extends Model
{
    protected $table = 'CATEGORIACUESTIONARIO';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDCATEGORIACUESTIONARIO',
        'IDCUESTIONARIO',
        'IDCATEGORIA',
        'CANTIDADPREGUNTAS',
        'PORCENTAJECATEGORIA',
        
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