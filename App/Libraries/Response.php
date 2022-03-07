<?php

namespace App\Libraries;

class Response
{

     /**
     * Inject response in json format
     * @param array $response
     * @return array
     */

    public static function set(array $response) : array
    {
        if (!headers_sent()) :
            header('Content-Type: application/json');
        endif;

        exit(json_encode($response));
    }
}
