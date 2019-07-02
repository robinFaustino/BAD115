<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExamen extends Model
{
    protected $table = "tipo_examen";

    protected $primaryKey = 'idtipoexamen';

    public $timestamps = false;

    protected $fillable = [
    	'nombre',
    ];

    protected $guarded =[
    ];

    public function examenes()
    {
        return $this->hasMany('App\Examen', 'idexamen');
    }
}
