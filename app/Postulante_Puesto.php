<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante_Puesto extends Model
{
    //
    protected $table = "postulante_puesto"; //cambiar nombre tabla

	protected $primaryKey = 'id'; //cammbiar atributo

    public $timestamps=false;

    protected $fillable = [
    	'idpuestotrabajo','idpostulante', 
    ];

    protected $guarded =[

    ];
}
