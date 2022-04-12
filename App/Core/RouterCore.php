<?php

namespace App\Core;

use App\Helper\Utils;

class RouterCore
{
    private $uri;
    private $getArr = [];
    private const CONTROLLER_PATH = "App\\Controller\\";

    public function __construct()
    {
        $this->initialize();
        require_once('../app/Config/Router.php');
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?')) {
            $uri = mb_substr($uri, 0, strpos($uri, '?'));
        }

        $ex = explode('/', $uri);

        $uri = $this->normalizeURI($ex);

        $this->uri = implode('/', $this->normalizeURI($uri));

        if (Utils::checkEnableDebug()) {
            var_dump(($this->uri));
        }
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
            return (new \App\Controller\Message)->message('Dados inválidos', 'Controller ou método não encontrado: ' . $get, 404);
        }

        $cont = static::CONTROLLER_PATH . $ex[0];

        if (!class_exists($cont)) {
            return (new \App\Controller\Message)->message('Dados inválidos', 'Controller não encontrada: ' . $get, 404);
        }

        if (!method_exists($cont, $ex[1])) {
            return (new \App\Controller\Message)->message('Dados inválidos', 'Método não encontrado: ' . $get, 404);
        }

        //$container = require_once '../App/Config/Container.php';

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
