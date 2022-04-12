<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Libraries\Response;
use App\Service\ProductService;

use App\Helper\Input;

class Product extends Controller
{

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @route("/product", method={"POST"})
     */

    public function getAll()
    {
        return var_dump($this->service);
        //return Response::json($this->service->getAll());
    }
}
