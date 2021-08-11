<?php

namespace App\Controller;

use App\Core\Controller;
use App\Libraries\Response;
use App\Model\ProductModel;

use App\Helper\Input;

class Product extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel;
        $this->response = new Response;
    }

    public function all()
    {
        $this->response->setMessage('Testando');
        return $this->response->getResponse();
    }
}
