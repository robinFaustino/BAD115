<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logro extends Model
{
    protected $table = "logro"; 

	protected $primaryKey = 'idlogro';

    public $timestamps=false;

    protected $fillable = [
    	'idpostulante',
    	'idtipologro',
    	'fechainicio',
    	'fechafin',
    	'descripcion',
    	'institucion'
    ];

    protected $guarded =[

    ];

    public function tipoLogro()
    {
    	return belongsTo('App\TipoLogro);
    }
}
