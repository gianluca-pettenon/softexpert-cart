<?php

namespace App\Helper;

class Input
{
    public static function get($value, int $filter = FILTER_SANITIZE_STRING)
    {
        if (is_array($value)) :
            return filter_input_array(INPUT_GET, $value, $filter);
        endif;

        return filter_input(INPUT_POST, $value, $filter);
    }

    public static function post($value, int $filter = FILTER_SANITIZE_STRING)
    {
        if (is_array($value)) :
            return filter_input_array(INPUT_POST, $value, $filter);
        endif;

        return filter_input(INPUT_POST, $value, $filter);
    }
}
