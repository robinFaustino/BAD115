<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{

      /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */

     public function rules()
    {
    $user = User::find($this->route('user'));

        $rules = array(
            'rol_id'   => 'required',
            'nombre'   => 'required|max:100',
            'email'    => 'required|max:100|email|unique:users,email,' . $this->route('user'),
            'password' => 'max:100',
        );

        if ($user == null) {
            $rules['password'] .= '|required|min:8';
        }

        return $rules;
    }
}
