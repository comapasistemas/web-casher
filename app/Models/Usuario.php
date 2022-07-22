<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
	
	protected $table = 'usuarios';

    protected $fillable = [
        'nombres',
        'apellidopaterno',
        'apellidomaterno',
        'cuenta',
        'email',
        'usuario',
        'password',
        'acepto_terminos_condiciones',
        'actualizado',
        'aprobado',
    ];

    public function getNombreCompletoAttribute()
    {
        $data = [
            $this->nombres,
            $this->apellidopaterno,
            $this->apellidomaterno,
        ];

        return implode(' ', $data);
    }
}
