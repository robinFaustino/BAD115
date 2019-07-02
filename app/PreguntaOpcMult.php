<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaOpcMult extends Model
{
    protected $table = "preguntas_opc_mult";

    protected $primaryKey = 'idpreguntaom';

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

    public function opciones()
    {
        return $this->hasMany('App\Opcion', 'idopcion');
    }

    // Agregar idpostpreguntaom si da error en withPivot: ['idpostpreguntaom', 'respuestaom']
    public function postulantes()
    {
        return $this->belongsToMany('App\Postulante', 'postulante_pregunta_opc_mult')
            ->withPivot('respuestaom');
    }

    // Agregar a modelo Postulante si es necesario
    // Agregar idpostpreguntaom si da error en withPivot: ['idpostpreguntaom', 'respuestaom']
    /*
    public function preguntas_opc_mult()
    {
        return $this->belongsToMany('App\PreguntaOpcMult', 'postulante_pregunta_opc_mult')
            ->withPivot('respuestaom')
    }
    */
}
