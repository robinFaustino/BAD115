<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaFV extends Model
{
    protected $table = "preguntas_fv";

    protected $primaryKey = 'idpreguntafv';

    public $timestamps = false;

    protected $fillable = [
    	'idexamen',
    	'descripcion',
    	'puntaje',
    ];

    protected $guarded =[
    ];

    public function examen()
    {
        return $this->belongsTo('App\Examen', 'idexamen');
    }

    // Agregar idpostpreguntafv si da error en withPivot: ['idpostpreguntafv', 'respuestafv']
    public function postulantes()
    {
        return $this->belongsToMany('App\Postulante', 'postulante_pregunta_fv')
            ->withPivot('respuestafv');
    }

    // Agregar a modelo Postulante si es necesario
    // Agregar idpostpreguntafv si da error en withPivot: ['idpostpreguntafv', 'respuestafv']
    /*
    public function preguntas_fv()
    {
        return $this->belongsToMany('App\PreguntaFV', 'postulante_pregunta_fv')
            ->withPivot('respuestafv')
    }
    */
}
