<?php

namespace App\Libraries;

class Response
{
    public function __construct()
    {
        $this->response = [];
    }

    public function setMessage($message)
    {
        $this->response['message'] = $message;
    }

    public function setUri($uri)
    {
        $this->response['uri'] = $uri;
    }

    public function setData($data)
    {
        $this->response['data'] = $data;
    }

    public function setClass($class)
    {
        $this->response['class'] = $class;
    }

    public function getResponse()
    {
        if (!headers_sent()) :
            header('Content-Type: application/json');
        endif;

        exit(json_encode($this->response));
    }
    
}
