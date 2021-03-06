<?php

namespace App\Core;


class RouterCore
{
    private $uri;
    private $method;
    private $getArr = [];

    public function __construct()
    {
        $this->initialize();
        require_once('../App/Config/Router.php');
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];
     
        if (strpos($uri, '?'))
            $uri = mb_substr($uri, 0, strpos($uri, '?'));

            
        $ex = explode('/', $uri);
       
        $uri = $this->normalizeURI($ex);
        
        $this->uri = implode('/', $this->normalizeURI($uri));
        
        if (DEBUG_URI)
            var_dump(($this->uri));
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function post($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute()
    {
        switch ($this->method) {

            case 'GET':
                $this->executeGet();
            break;

            case 'POST':
                $this->executePost();
            break;
        }
    }

    private function executeGet()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }
            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    break;
                } else {
                    $this->executeController($get['call']);
                }
            }
        }
    }

    private function executePost()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }

            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }

                $this->executeController($get['call']);
            }
        }
    }

    private function executeController($get)
    {
        $ex = explode('@', $get);

        if (!isset($ex[0]) || !isset($ex[1])) {
            (new \App\Controller\Message)->message('Dados inv??lidos', 'Controller ou m??todo n??o encontrado: ' . $get, 404);
            return;
        }

        $cont = 'App\\Controller\\' . $ex[0];

        if (!class_exists($cont)) {
            (new \App\Controller\Message)->message('Dados inv??lidos', 'Controller n??o encontrada: ' . $get, 404);
            return;
        }


        if (!method_exists($cont, $ex[1])) {
            (new \App\Controller\Message)->message('Dados inv??lidos', 'M??todo n??o encontrado: ' . $get, 404);
            return;
        }

        call_user_func_array([
            new $cont,
            $ex[1]
        ], []);
    }

    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}
