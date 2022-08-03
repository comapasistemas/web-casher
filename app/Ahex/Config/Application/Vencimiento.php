<?php

namespace App\Ahex\Config\Application;

class Vencimiento
{
    private static $claves_vencimiento_cache = null;

    private static function all()
    {
        if( is_null(self::$claves_vencimiento_cache) )
            self::$claves_vencimiento_cache = config('comuapoa.claves_vencimiento');

        return self::$claves_vencimiento_cache;
    }

    public static function getDias()
    {
        return array_values(self::all());
    }

    public static function getClaves()
    {
        return array_keys(self::all());
    }

    public static function getDiaPorClave(int $clave)
    {
        return array_key_exists($clave, self::all()) ? self::all()[$clave] : null;
    }

    public static function getClavePorDia(string $dia)
    {
        return in_array($dia, self::all()) ? array_search($dia, self::all()) : null;
    }

    public static function isPrimeraClave(int $clave)
    {
        return array_key_first(self::all()) == $clave;
    }

    public static function isUltimaClave(int $clave)
    {
        return array_key_last(self::all()) == $clave;
    }
}
