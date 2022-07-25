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

    protected $guarded = [
        // 'password'
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

    public function scopeAllWithDecoded($query)
    {
        return self::selectRaw('*, DECODE(password, ?) as decoded', [self::$salt]);
    }

    private static function encodePasswordByMySQL(string $password)
    {
        return DB::select(DB::raw("SELECT ENCODE(?, ?) as encoded"), [$password, self::$salt]);
    }
}
