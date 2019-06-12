<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Conocimiento_AcademicoFormRequest extends FormRequest
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
            'tipo' => 'required|max:50',
            'nombre' => 'required|max:75',
            'institucionacademico' => 'required|max:75',
            'fechainicio' => 'required|max:50',
            'fechafin' => 'required|max:50'
        ];
    }
}
