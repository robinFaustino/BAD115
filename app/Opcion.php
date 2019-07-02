<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = "opciones";

    protected $primaryKey = 'idopcion';

    public $timestamps = false;

    protected $fillable = [
    	'idpreguntaom',
    	'descripcion',
    	'porcentaje',
    ];

    protected $guarded =[
    ];

    public function pregunta_opc_mult()
    {
        return $this->belongsTo('App\PreguntaOpcMult', 'idpreguntaom');
    }
}
