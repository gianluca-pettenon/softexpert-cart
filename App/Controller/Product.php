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
        $this->model->setName(Input::post($_POST['productName']));
        $this->model->setDescription(Input::post($_POST['productDescription']));
        $this->model->setPrice((float)Input::post($_POST['productPrice']));
        
        $data = $this->model->create();

        Response::set($data);
        return Response::get($data);
    }

    public function type()
    {
        $this->model->load;
    }
}
