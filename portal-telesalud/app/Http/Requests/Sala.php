<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaInstantaneaPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'nombre' => ['required', 'alpha:ascii', 'max:255'],
            'email' => ['email'],
            'telefono' => ['required', 'integer', 'max_digits:8'],
        ];
    }
}
