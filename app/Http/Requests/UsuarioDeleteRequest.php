<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioDeleteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'eliminar' => ['required','accepted'],
        ];
    }

    public function messages()
    {
        return [
            'eliminar.required' => __('Marca la casilla de eliminar usuario'),
            'eliminar.required' => __('Marca una casilla válida para eliminar usuario'),
        ];
    }
}
