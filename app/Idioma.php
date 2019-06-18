<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = "idioma"; 

	protected $primaryKey = 'ididioma'; 

    public $timestamps=false;

    protected $fillable = [
    	'idhabilidadlenguaje',
    	'nombre',
    ];

    public function habilidadLenguaje()
    {
    	return $this->belonsTo('App\HabilidadLenguaje');
    }  
}
