<?php

namespace App\Libraries;

class Container
{
    public static function setData(array $data)
    {
        (!isset($_SESSION) ? session_start() : '');

        foreach ($data as $key => $value) :

            if(!isset($_SESSION[$key])) :
                $_SESSION[$key] = $value;
            endif;
            
        endforeach;    
    }

    public static function getData($param = null)
    {
        (!isset($_SESSION) ? session_start() : '');
        return (empty($param) ? $_SESSION : $_SESSION[$param]);
    }
    
    public static function destroy()
    {
        (!isset($_SESSION) ? session_start() : '');
        session_destroy();
    }
}
