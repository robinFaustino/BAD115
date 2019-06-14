<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienciaLaboralFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombrepuesto' => 'required|max:50',
            'fechainicio'  => 'required|max:50',
            'fechafin' => 'required|max:50',
            'funcion' => 'required|max:50',
            'nombreorganizacion' => 'required|max:50',
            'telefonoorganizacion' =>'required|min:8',
            'correoorganizacion' => 'email|max:50'
        ];
    }
}
