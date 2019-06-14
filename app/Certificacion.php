<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    //
    protected $table = "certificacion"; 

	protected $primaryKey = 'idcertificacion'; 

    public $timestamps=false;

    protected $fillable = [
    	'titulo','tipo','codigo','institucion','fechainicio','fechafin',
    ];

    protected $guarded =[

    ];
}
