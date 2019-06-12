<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = "empresa";

    protected $primaryKey = 'idempresa';

    public $timestamps=false;

    protected $fillable = [
    	'nombre','paginaweb','descripcion','correo','telefono',
    ];

    protected $guarded =[

    ];
}
