<?php

namespace App;

//use App\Validator;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Database\Eloquent\Model;

class Puesto_Trabajo extends Model
{
    //
    protected $table = "puesto_trabajo";

    protected $primaryKey = 'idpuestotrabajo';

    public $timestamps=false;

    protected $fillable = array(
    	'iddepartamento','idempresa','nombre','descripcion','experiencia','anosexp','salariomin','salariomax','conocimiento','educacion','rangoedad','vacantes','fechacontrato','estado',
    );

    protected $guarded =[

    ];

    public $errors;

    public function isValid($data)
    {
        $rules = array(
            'nombre' => 'required|max:75',
            'descripcion' => 'required|max:100',
            'experiencia' => 'required|max:75',
            'anosexp' => 'required|numeric',
            'salariomin' => 'required|numeric',
            'salariomax'=> 'required|numeric',
            'conocimiento' => 'required|max:75',
            'educacion' => 'required|max:75',
            'rangoedad'=> 'required|max:10',
            'vacantes'=> 'required|numeric',
            'fechacontrato' => 'required|max:75'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
}
