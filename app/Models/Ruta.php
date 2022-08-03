<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    protected $guarded = [];

    protected static $claves_vencimiento_cache = null;

    public $timestamps = false;

    public function getClaveRutaAttribute()
    {
        return (int) $this->CVE_RUTA;
    }

    public function getClaveVencimientoAttribute()
    {
        return (int) $this->CVE_VENC;
    }

    public function getDiaVencimientoAttribute()
    {
        return self::getDiaVencimientoPorClave($this->clave_vencimiento);
    }

    public static function getDiaVencimientoPorClave(int $clave)
    {
        return array_key_exists($clave, self::clavesVencimiento()) ? self::clavesVencimiento()[$clave] : null;
    }

    public static function getClaveVencimientoPorDia(string $dia)
    {
        return in_array($dia, self::clavesVencimiento()) ? array_search($dia, self::clavesVencimiento()) : null;
    }

    private static function clavesVencimiento()
    {
        if( is_null(self::$claves_vencimiento_cache) )
            self::$claves_vencimiento_cache = config('comuapoa.claves_vencimiento');

        return self::$claves_vencimiento_cache;
    }
}
