<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usuario extends Authenticatable
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
        return implode(' ', [
            $this->nombres,
            $this->apellidopaterno,
            $this->apellidomaterno,
        ]);
    }

    public function scopeFindWithDecoded($query, $value, $column = 'id')
    {
        return $query->selectRaw('*, DECODE(password, ?) as decoded', [config('salts.usuario')])->where($column, $value);
    }

    public function scopeExisteActivado($query, $usuario, $columna = 'id')
    {
        return $query->where($columna, $usuario)->where('activado', 1)->exists();
    }

    public static function allWithDecodedPassword()
    {
        return self::selectRaw('*, DECODE(password, ?) as decoded', [config('salts.usuario')]);
    }

    public static function createWithEncodedPassword(array $validated)
    {    
        $salt = config('salts.usuario');

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

    public static function prepareWithEncodedPassword(array $validated)
    {
        if( isset($validated['secretword']) )
        {
            $salt = config('salts.usuario');
            $validated['password'] = DB::raw("ENCODE('{$validated['secretword']}', '{$salt}')");
            $validated['secretword'] = Hash::make($validated['secretword']);
        }

        return $validated;
    }

    private static function getEncodedPasswordByMySQL(string $password)
    {
        return DB::select(DB::raw("SELECT ENCODE(?, ?) as encoded"), [$password, config('salts.usuario')]);
    }
}
