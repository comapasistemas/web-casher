<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;

	protected $table = 'usuarios';
	
    private static $salt = 'hackcomapa';

    protected $fillable = [
        'nombres',
        'apellidopaterno',
        'apellidomaterno',
        'cuenta',
        'email',
        'usuario',
        'password',
        'secretword',
        'acepto_terminos_condiciones',
        'actualizado',
        'aprobado',
    ];

    public function setSecretwordAttribute($value)
    {
        $this->attributes['secretword'] = Hash::make($value);
    }

    public function getNombreCompletoAttribute()
    {
        $data = [
            $this->nombres,
            $this->apellidopaterno,
            $this->apellidomaterno,
        ];

        return implode(' ', $data);
    }

    public static function allWithDecodedPassword()
    {
        return self::selectRaw('*, DECODE(password, ?) as decoded', [self::$salt]);
    }

    public static function createWithEncodedPassword(array $validated)
    {    
        $salt = self::$salt;

        $usuario_id = self::insertGetId([
            'nombres' => $validated['nombres'],
            'apellidopaterno' => $validated['apellidopaterno'],
            'apellidomaterno' => $validated['apellidomaterno'],
            'cuenta' => $validated['cuenta'],
            'email' => $validated['email'],
            'usuario' => $validated['usuario'],
            'password' => DB::raw("ENCODE('{$validated['secretword']}', '{$salt}')"),
            'secretword' => Hash::make($validated['secretword']),
        ]);

        return self::find($usuario_id);
    }

    private static function encodePasswordByMySQL(string $password)
    {
        return DB::select(DB::raw("SELECT ENCODE(?, ?) as encoded"), [$password, self::$salt]);
    }
}
