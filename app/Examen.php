<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table = "examen";

    protected $primaryKey = 'idexamen';

    public $timestamps = false;

    protected $fillable = [
    	'idempresa',
    	'idtipoexamen',
    	'fecha',
    ];

    protected $guarded =[
    ];

    public function preguntas_fv()
    {
        return $this->hasMany('App\PreguntaFV', 'idpreguntafv');
    }

    public function preguntas_opc_mult()
    {
        return $this->hasMany('App\PreguntaOpcMult', 'idpreguntaom');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'idempresa');
    }

    public function tipo_examen()
    {
        return $this->belongsTo('App\TipoExamen', 'idtipoexamen');
    }

    public function postulantes()
    {
        return $this->belongsToMany('App\Postulante', 'examen_postulante')
            ->withPivot('nota');
    }
}
