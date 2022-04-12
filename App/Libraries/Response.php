<?php

namespace App\Libraries;

class Response
{

    /**
     * @param array|string $response
     * @return array|string
     */

    public static function json(array|string $response): array|string
    {
        if (!headers_sent()) :
            header('Content-Type: application/json');
        endif;

        exit(json_encode($response));
    }
}
