<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EXPERIENCIA_POSTULANTE extends Model
{
    //EXPERIENCIA_LABORAL_POSTULANTE
    protected $table = "experiencia_laboral_postulante"; //cambiar nombre tabla

	protected $primaryKey = 'id'; //cammbiar atributo

    public $timestamps=false;

    protected $fillable = [
    	'idexperiencialaboral','idpostulante', 
    ];

    protected $guarded =[

    ];
}
