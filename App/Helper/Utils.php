<?php

namespace App\Helper;

class Utils
{

    /**
     * @param string $value
     * @return string
     */

    public static function getEnv(string $value): string
    {
        return getenv($value);
    }

    /**
     * @return bool
     */

    public static function isDevelopment(): bool
    {
        if (static::getEnv('app.environment') == 'development') :
            return true;
        endif;

        return false;
    }

    /**
     * @return bool
     */

    public static function checkEnableDebug(): bool
    {
        if (static::isDevelopment()) :

            if (static::getEnv('app.debug') == 1) :
                return true;
            endif;

        endif;

        return false;
    }
}
