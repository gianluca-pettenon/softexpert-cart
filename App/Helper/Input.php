<?php

namespace App\Helper;

class Input
{

    private const METHODFILTER = FILTER_SANITIZE_FULL_SPECIAL_CHARS;

    /**
     * @param array $value
     * @return array
     */

    public static function sanitize(array $value): array
    {
        return filter_input_array(INPUT_POST, $value, static::METHODFILTER);
    }


}
