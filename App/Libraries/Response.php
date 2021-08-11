<?php

namespace App\Libraries;

class Response
{

    private static $response;

    public static function set($response)
    {
        self::$response = $response;
    }

    public static function get()
    {
        if (!headers_sent()) :
            header('Content-Type: application/json');
        endif;

        exit(json_encode(self::$response));
    }
    
}
