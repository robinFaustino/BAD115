<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class Puesto_TrabajoFormRequest extends FormRequest
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
        ];
    }
}
