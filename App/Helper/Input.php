<?php

namespace App\Helper;

class Input
{

    private const METHODFILTER = FILTER_SANITIZE_FULL_SPECIAL_CHARS;
	// FILTER_SANITIZE_STRING

    /**
     * @param array $value
     * @return array
     */

    public static function get($value)
    {
        return filter_input_array(INPUT_GET, $value, static::METHODFILTER);
    }

    /**
     * @param array $value
     * @return array
     */

    public static function post($value)
    {
        return filter_input_array(INPUT_POST, $value, static::METHODFILTER);
    }
}
