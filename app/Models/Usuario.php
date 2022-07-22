<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    private static function encodePasswordByMySQL(string $value)
    {
        return DB::select( DB::raw("SELECT ENCODE({$value}, 'hackcomapa') as encoded") );
    }

    private static function decodePasswordByMySQL(int $id)
    {
        return DB::select( DB::raw("SELECT DECODE(password, 'hackcomapa') as decoded from usuarios where id = {$id}") );
    }
}
