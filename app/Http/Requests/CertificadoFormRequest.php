<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificadoFormRequest extends FormRequest
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
            //'nombrepuesto' => 'required|max:50',
            'titulo' => 'required|max:75',
            'tipo' => 'required|max:50',
            'codigo' => 'required|max:10',
            'institucion' => 'max:50',
            'fechainicio'=> 'max:50',
            'fechafin' => 'max:50'
        ];
    }
}
