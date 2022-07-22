<?php

// Nombres de grupos de Helpers
$filenames = [
    'text',
];

// Cargador de archivos PHP de los Helpers
foreach($filenames as $filename)
{
    include_once realpath(__DIR__) . "\\{$filename}.php";
}
