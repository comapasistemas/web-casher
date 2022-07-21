<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Contrato
            'cuenta' => ['required','numeric','digits:6','exists:padron,cuenta','unique:cuentas,cuenta'],
            'nombre_recibo' => ['required','regex:/[A-Z]/','exists:padron,nombre,cuenta,' . $this->cuenta],

            // Informacion
            'nombres' => ['required','regex:/[a-zA-Z\s]/'],
            'apellidopaterno' => ['required','regex:/[a-zA-Z\s]/'],
            'apellidomaterno' => ['required','regex:/[a-zA-Z\s]/'],

            // Acceso
            'email' => ['required','email:dns','unique:usuarios,email'],
            'usuario' => ['required','alpha_num','between:6,10','unique:usuarios,usuario'],
            'password' => ['required','between:6,10','confirmed'],
            'acepto_terminos_condiciones' => ['required','accepted'],
        ];
    }

    public function messages()
    {
        return [
            // Contrato
            'cuenta.required' => __('Escribe el número de cuenta'),
            'cuenta.numeric' => __('Escribe un número de cuenta válido'),
            'cuenta.digits' => __('El número de cuenta debe ser de 6 dígitos'),
            'cuenta.exists' => __('El número de cuenta no existe en el sistema de contratos'),
            'cuenta.unique' => __('El número de cuenta ha sido registrado anteriormente'),
            'nombre_recibo.required' => __('Escribe el nombre completo del recibo'),
            'nombre_recibo.regex' => __('Escribe un nombre completo válido del recibo'),
            'nombre_recibo.exists' => __('El número de cuenta y el nombre del recibo no coinciden'),

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
            'usuario.between' => __('El usuario debe tener entre 6 a 10 caractéres'),
            'usuario.unique' => __('Escribe otro nombre de usuario diferente'),
            'password.required' => __('Escribe la contraseña de usuario'),
            'password.between' => __('La contraseña debe tener entre 6 a 10 caractéres'),
            'password.confirmed' => __('Escribe la misma contraseña para confirmar'),

            'acepto_terminos_condiciones.required' => __('Aceptar los términos y condiciones de la aplicación'),
            'acepto_terminos_condiciones.accepted' => __('Aceptar los términos y condiciones de la aplicación'),
        ];
    }

    public function prepareForValidation()
    {
        $purify = function ($text) {
            return utf8_encode( trim($text) );
        };

        $capitalize = function ($text) {
            return ucwords( strtolower($text) );
        };

        $this->merge([
            'cuenta' => $this->numero_cuenta,
            'nombre_recibo' => $purify($this->nombre_recibo),

            'nombres' => $capitalize( $purify($this->nombres) ),
            'apellidopaterno' => $capitalize( $purify($this->apellido_paterno) ),
            'apellidomaterno' => $capitalize( $purify($this->apellido_materno) ),
 
            'email' => strtolower($this->correo_electronico),
            'password' => $this->contrasena,
            'password_confirmation' => $this->confirmar_contrasena,
        ]);
    }
}
