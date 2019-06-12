<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = "departamento";

    protected $primaryKey = 'iddepartamento';

    public $timestamps=false;

    protected $fillable = [
    	'idpais','nombre',
    ];

    protected $guarded =[

    ];
}
