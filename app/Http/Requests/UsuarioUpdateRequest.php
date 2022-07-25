<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Informacion
            'nombres' => ['required','regex:/[a-zA-Z\s]/'],
            'apellidopaterno' => ['required','regex:/[a-zA-Z\s]/'],
            'apellidomaterno' => ['required','regex:/[a-zA-Z\s]/'],

            // Acceso
            'email' => ['bail','required','email:filter','unique:usuarios,email,' . $this->usuario_id],
            'usuario' => ['bail','required','alpha_num','between:6,12','unique:usuarios,usuario,' . $this->usuario_id],
            'secretword' => ['sometimes','nullable','min:6','confirmed'],
        ];
    }

    public function messages()
    {
        return [
            // Informacion
            'nombres.required' => __('Escribe el nombre(s)'),
            'nombres.regex' => __('Escribe un nombre(s) válido'),
            'apellidopaterno.required' => __('Escribe el apellido paterno'),
            'apellidopaterno.regex' => __('Escribe un apellido paterno válido'),
            'apellidomaterno.required' => __('Escribe el apellido materno'),
            'apellidomaterno.regex' => __('Escribe un apellido materno válido'),

            // Acceso
            'email.required' => __('Escribe el correo electrónico'),
            'email.email' => __('Escribe un correo electrónico válido'),
            'email.unique' => __('Escribe otro correo electrónico diferente'),
            'usuario.required' => __('Escribe el nombre de usuario'),
            'usuario.alpha_num' => __('El usuario debe contener solo letras y números'),
            'usuario.between' => __('El usuario debe tener entre 6 a 12 caractéres'),
            'usuario.unique' => __('Escribe otro nombre de usuario diferente'),
            'secretword.required' => __('Escribe la contraseña de usuario'),
            'secretword.min' => __('La contraseña debe tener mínimo de 6 caractéres'),
            'secretword.confirmed' => __('Verifica la confirmación de la contraseña'),
        ];
    }

    public function prepareForValidation()
    {
        $this->usuario_id = $this->route()->originalParameter('usuario');

        $this->merge([
            // Informacion
            'nombres' => capitalizeText( trim($this->nombres) ),
            'apellidopaterno' => capitalizeText( trim($this->apellido_paterno) ),
            'apellidomaterno' => capitalizeText( trim($this->apellido_materno) ),

            // Acceso
            'email' => strtolower($this->correo_electronico),
            'secretword' => $this->contrasena,
            'secretword_confirmation' => $this->confirmar_contrasena,
        ]);

        if( is_null($this->contrasena) )
            $this->request->remove('secretword');
    }
}
