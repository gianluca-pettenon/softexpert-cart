<?php

namespace App\Libraries;

class Response
{

     /**
     * @param array $response
     * @return object
     */

    public static function json(array $response) : object
    {
        if (!headers_sent()) :
            header('Content-Type: application/json');
        endif;

        exit(json_encode($response));
    }
}
