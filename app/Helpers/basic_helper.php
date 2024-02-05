<?php

if (!function_exists('getMessage')) {
    function getMessage($file, $prefix, $suffix)
    {
        return __($file.'.'.$prefix.'.'.$suffix);
    }
}
