<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipio";

    protected $primaryKey = 'idmunicipio';

    public $timestamps=false;

    protected $fillable = [
    	'iddepartamento','nombre',
    ];
    
    protected $guarded =[

    ];
}
