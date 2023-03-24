<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaInstantaneaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'regex:/^[\pL\-]+$/u', 'max:255'],
            'telefono' => ['required', 'integer', 'max_digits:8', 'min_digits:8'],
            'email' => ['email'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.regex' => 'El nombre debe tener solo alfanumericos',
            'nombre.max' => 'La longitud no debe superar los 255 caracteres',
            'telefono.required' => 'El telefono es requerido',
            'telefono.integer' => 'La longitud no debe superar los 255 caracteres',
            'telefono.max_digits' => 'El telefono debe tener 8 digitos',
            'telefono.min_digits' => 'El telefono debe tener 8 digitos',
            'email' => 'El email no es un correo valido',
        ];
    }
}
