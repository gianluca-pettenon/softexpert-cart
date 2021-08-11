<?php

namespace App\Controller;

use App\Core\Controller;
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
        $class = $this->model->test();

        $this->load('admin/product', [
            'class' => $class
        ]);
    }


}
