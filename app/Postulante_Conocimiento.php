<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante_Conocimiento extends Model
{
    //
    protected $table = "postulante_conocimiento"; //cambiar nombre tabla

	protected $primaryKey = 'id'; //cammbiar atributo

    public $timestamps=false;

    protected $fillable = [
    	'idpostulante','idconocimientoacademino', 
    ];

    protected $guarded =[

    ];
}
