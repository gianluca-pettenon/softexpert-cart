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
    }

    public function all()
    {
        Response::set(['message' => 'testing']);
        return Response::get();
    }

    public function create()
    {
        $data = $this->model->create([
            'name'  => 'Testando',
            'price' => '12.5'
        ]);

        /*Response::set($data);
        return Response::get();*/
        return var_dump($data);
    }

}
