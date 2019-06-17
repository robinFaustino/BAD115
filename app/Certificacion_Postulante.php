<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacion_Postulante extends Model
{
    //
    protected $table = "certificacion_postulante"; //cambiar nombre tabla

	protected $primaryKey = 'id'; //cammbiar atributo

    public $timestamps=false;

    protected $fillable = [
    	'idcertificacion','idpostulante', 
    ];

    protected $guarded =[

    ];
}
