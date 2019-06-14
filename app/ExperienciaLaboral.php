<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    //
    protected $table = "experiencia_laboral"; 

	protected $primaryKey = 'idexperiencialaboral'; 

    public $timestamps=false;

    protected $fillable = [
    	'nombrepuesto','fechainicio','fechafin','funcion','nombreorganizacion','telefonoorganizacion','correoorganizacion',
    ];

    protected $guarded =[

    ];
}
