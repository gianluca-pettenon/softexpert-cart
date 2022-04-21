<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Libraries\Response;
use App\Service\Product\ProductService;

use App\Helper\Input;

class Product extends Controller
{

    private ProductService $service;

    public function __construct()
    {
        $this->service = new ProductService;
    }

    /**
     * @route("/product", method={"POST"})
     */

    public function getAll()
    {
        return Response::json($this->service->getAll());
    }

    /**
     * @route("/product/create", method={"POST"})
     */

    public function create()
    {
        return Response::json(['coming soon.']);
    }

}
