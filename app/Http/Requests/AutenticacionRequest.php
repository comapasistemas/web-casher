<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutenticacionRequest extends FormRequest
{
    private $message_try_again = 'Usuario ó contrseña incorrectos';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => ['required','string','exists:usuarios,usuario'],
            'password' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => __('Escribe el nombre de usuario'),
            'password.required' => __('Escribe la contraseña de usuario'),
            'username.string' => __($this->message_try_again),
            'username.exists' => __($this->message_try_again),
            'password.min' => __($this->message_try_again),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'username' => $this->usuario,
            'password' => $this->contrasena,
        ]);
    }
}
