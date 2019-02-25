<?php

if (!function_exists('to_bool')) {
    function to_bool($value)
    {
        if (
            $value === 'false' ||
            $value === 'FALSE' ||
            $value === '0' ||
            $value === 0
        ) {
            return false;
        }

        return (bool) $value;
    }
}
