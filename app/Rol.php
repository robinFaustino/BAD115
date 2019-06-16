<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = "roles";

    protected $primaryKey='id';

    protected $fillable = ['nombre',];

    //relacion de un rol tiene muxos usuarios
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
