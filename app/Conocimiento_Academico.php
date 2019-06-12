<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conocimiento_Academico extends Model
{
    //
	protected $table = "conocomiento_academico"; //cambiar nombre tabla

	protected $primaryKey = 'idconocimientoacademino'; //cammbiar atributo

    public $timestamps=false;

    protected $fillable = [
    	'tipo','nombre','institucionacademico','fechainicio','fechafin',
    ];

    protected $guarded =[

    ];

}
