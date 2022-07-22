<?php

// TEXT

if(! function_exists('translateUTF8') )
{
    function translateUTF8(string $text)
    {
        return utf8_decode( utf8_encode($text) );
    }
}

if(! function_exists('capitalizeText') )
{
    function capitalizeText(string $text)
    {
        return ucwords( strtolower($text) );
    }
}
