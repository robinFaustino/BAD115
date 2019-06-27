<?php

namespace App\Http\Requests;

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
        $rules = array(
            'role_id'   => 'required',
            'nombre'   => 'required|min:6|max:100',
            'email'    => 'required|max:100|email|unique:users',
            'password' => 'min:6|required|max:100',
        );

        return $rules;
    }
}
