<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class RecomendacionRequest extends FormRequest
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
            'idpostulante' => 'required',
            'nombre' => 'required|max:75',
            'telefono' => 'required|max:8', 
            'correo' => 'required|max:50',
            'institucion' => 'required|max:50',
        ];
    }
}
