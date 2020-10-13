<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPersona extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // lo lugar indica para revisar permiso
        // if(Auth::user()->tipousuario === 'ADMIN'){
        //     return true;
        // }else{
        //     return true;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $reglas = [
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
        return $reglas;
    }

    public function withValidator($validator)
    {
        $correoValido = false;
        $correo = explode("@", $this->email);
        if ($correo[1] === 'unprg.edu.pe') {
            $correoValido = true;
        }
        $validator->after(function ($validator) use ($correoValido) {
            if ($correoValido === false) {
                $validator->errors()->add('email', 'El correo debe terminar en unprg.edu.pe');
            }
        });
    }
}
