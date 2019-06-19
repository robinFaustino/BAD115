<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    //
    protected $table = "recomendacion"; 

	protected $primaryKey = 'idrecomendacion'; 

    public $timestamps=false;

    protected $fillable = [
    	'nombre','telefono','correo','institucion',
    ];

    public function postulante()
    {
    	return $this->belongsTo('App\Postulante');
    }
}
