<?php

namespace App\Helper;

class Input
{
    public static function get(string $value, int $filter = FILTER_SANITIZE_STRING)
    {
        return filter_input(INPUT_GET, $value, $filter);
    }

    public static function post(string $value, int $filter = FILTER_SANITIZE_STRING)
    {
        return filter_input(INPUT_POST, $value, $filter);
    }
}
