<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Libraries\Response;
use App\Service\TypeProduct\TypeProductService;
use App\Helper\Input;

class TypeProduct extends Controller
{
    private TypeProductService $service;

    public function __construct()
    {
        $this->service = new TypeProductService;
    }

    /**
     * @route("/type-product", method={"POST"})
     */

    public function getAll()
    {
        return Response::json($this->service->getAll());
    }
}
