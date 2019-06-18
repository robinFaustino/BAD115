<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLogro extends Model
{
   
   protected $table = "tipo_logro"; 

	protected $primaryKey = 'idtipologro'; 

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    ];

    public function logros()
    {
    	return $this->hasMany('App\Logro');
    }
}
