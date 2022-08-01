<?php 

return [
    /**
     * Nombres de bancos activos en la actualidad de México
     * 
     */
    'nombres_bancos' => [
        'Banamex',
        'Banjercito',
        'Banorte', 
        'Banregio',
        'BBVA', 
        'HSBC',
        'Santander',
    ],

    /**
     * Redes globales para tarjetas de crédito y débito
     * 
     */
    'redes_tarjeta' => [
        'AMERICAN EXPRESS',
        'MASTERCARD',
        'VISA',
    ],

    /**
     * Períodos de vigencia en tarjetas bancarias se estima de 3 a 5 años, por lo que se realiza 
     * el calculo del tiempo de 5 años antes y después del año actual.
     * 
     * Generando el arreglo con la función: range()
     * Iniciando con el año máximo-futuro: date(Y) + 5
     * Terminando con el año mínimo-antiguo: date(Y) - 5
     * 
     * IMPORTANTE: date() debe estar configurado con la zona horaria para realizar 
     * los calculos correctos y estimados del período de años referente al tiempo actual
     * 
     * https://www.php.net/manual/es/function.date-default-timezone-set.php
     * https://www.php.net/manual/es/function.date.php
     * 
     */
    'vigencias_tarjeta' => range( (date('Y') + 5), (date('Y') - 5) ),
    'vigencia_maxima_tarjeta' => (date('Y') - 5),
    'vigencia_minima_tarjeta' => (date('Y') + 5),
];
