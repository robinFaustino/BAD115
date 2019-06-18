<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabilidadLenguaje extends Model
{
    protected $table = "habilidad_lenguaje"; 

	protected $primaryKey = 'idhabilidadlenguaje';

    public $timestamps=false;

    protected $fillable = [
    	'idpostulante',
    	'tipo',
    	'nivel',
    ];

    protected $guarded =[

    ];

    public function idioma()
    {
    	return $this->hasMany('App\Idioma');
    }
}
