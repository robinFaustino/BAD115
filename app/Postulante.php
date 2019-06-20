<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table = "postulante";

    protected $primaryKey = 'idpostulante';

    public $timestamps=false;

    protected $fillable = [
    	'firtsname','secondsname','lastname','genero','fechanacimiento','dui','pasaporte','nit','nup','idpais','departamento','municipio','telefono','correo','iduser','photo',
    ];

    protected $guarded =[

    ];
}
