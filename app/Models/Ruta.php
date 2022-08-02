<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    protected $guarded = [];

    protected static $claves_vencimiento = [
        1 => '05',
        2 => '10',
        3 => '15',
        4 => '20',
        5 => '25',
        6 => '30',
    ];

    public $timestamps = false;

    public function getClaveRutaAttribute()
    {
        return $this->CVE_RUTA;
    }

    public function getClaveVencimientoAttribute()
    {
        return $this->CVE_VENC;
    }

    public static function getDiaVencimientoPorClave(int $clave)
    {
        return array_key_exists($clave, self::$claves_vencimiento) ? self::$claves_vencimiento[$clave] : null;
    }

    public static function getClaveVencimientoPorDia(string $dia)
    {
        return in_array($dia, self::$claves_vencimiento) ? array_search($dia, self::$claves_vencimiento) : null;
    }
}
