<?php

namespace App\Ahex\Config\Application;

class Tiempo
{
    private static $tiempo_cache = null;

    private static function data()
    {
        if( is_null(self::$tiempo_cache) )
            self::$tiempo_cache = config('comuapoa.tiempo');

        return self::$tiempo_cache;
    }


    // Meses
    public static function meses()
    {
        return self::data()['meses'];
    }

    public static function nombreMes($clave)
    {
        return array_key_exists($clave, self::meses()) ? self::meses()[$clave] : null;
    }

    // Dias
    public static function dias()
    {
        return self::data()['dias'];
    }

    public static function nombreDia($clave)
    {
        return array_key_exists($clave, self::dias()) ? self::dias()[$clave] : null;
    }
}
