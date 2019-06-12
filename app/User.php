<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='users';

    protected $primaryKey='id';

    protected $fillable = [
        'nombre', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relacion inversa de un un rol tiene muxos usuarios
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    /**
     * Indica si el usuario tiene rol de Administrador.
     *
     * @return bool
     */
    public function Administrador() {
        return $this->rol_id = 1;
    }

}
