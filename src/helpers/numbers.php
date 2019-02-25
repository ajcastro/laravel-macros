<?php

if (!function_exists('to_float')) {
    function to_float($value)
    {
        $value = str_replace(',','', $value.'');

        return (float) $value;
    }
}

if (!function_exists('to_integer')) {
    function to_integer($value)
    {
        $value = str_replace(',','', $value.'');

        return (int) $value;
    }
}
