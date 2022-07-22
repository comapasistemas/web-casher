<?php

// TEXT

if(! function_exists('cleanEncode') )
{
    function cleanEncode(string $text)
    {
        return utf8_encode( trim($text) );
    }
}

if(! function_exists('capitalizeText') )
{
    function capitalizeText(string $text)
    {
        return ucwords( strtolower($text) );
    }
}
