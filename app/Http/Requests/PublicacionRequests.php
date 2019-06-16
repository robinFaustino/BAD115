<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionRequests extends FormRequest
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
            'tipo' => 'required',
            'titulo' => 'required|max:75',
            'lugar' => 'required|max:75',
            'fecha' => 'required',
            'edicion' => 'max:50',
            'isbn' => 'max:50',
            
        ];
    }
}
