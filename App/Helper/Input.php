<?php

namespace App\Helper;

class Input
{

    private const METHODFILTER = FILTER_SANITIZE_FULL_SPECIAL_CHARS;

    /**
     * @param array|string $value
     * @return array|string
     */

    public static function sanitize(array|string $value): array|string
    {

        if (is_array($value)) :
            return filter_input_array(INPUT_POST, $value, static::METHODFILTER);
        endif;

        return filter_input(INPUT_POST, $value, static::METHODFILTER);
    }


}
