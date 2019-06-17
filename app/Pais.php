<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "pais";

    protected $primaryKey = 'idpais';

    public $timestamps=false;

    protected $fillable = [
    	'nombre','continente',
    ];

    protected $guarded =[

    ];
}
