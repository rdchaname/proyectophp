<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarPersona extends FormRequest
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
            'apellido_paterno' => [
                'required', 'string', 'max:50'
            ],
            'apellido_materno' => [
                'required', 'string', 'max:50'
            ],
            'nombre' => [
                'required', 'string', 'max:50'
            ],
            'email' => [
                'required', 'email'
            ],
            'celular' => [
                'nullable'
            ],
            'direccion' => [
                'nullable'
            ]
        ];
    }
}
