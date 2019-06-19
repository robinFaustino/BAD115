<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogroRequest extends FormRequest
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
            'idtipologro' => 'required',
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'descripcion' => 'required|max:75',
            'institucion' => 'required|max:75',
        ];
    }
}
