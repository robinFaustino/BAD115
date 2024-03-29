<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = "publicacion"; 

	protected $primaryKey = 'idpubicacion'; 

    public $timestamps=false;

    protected $fillable = [
    	'idpostulante',
    	'tipo',
    	'titulo',
    	'lugar',
    	'fecha',
    	'edicion',
    	'isbn',
    ];

    public function postulante()
    {
    	return $this->belongsTo('App\Postulante');
    }
}
