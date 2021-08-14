<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public static function set($response)
    {
        if (!headers_sent()) :
            header('Content-Type: application/json');
        endif;

        exit(json_encode($response));
    }
}
