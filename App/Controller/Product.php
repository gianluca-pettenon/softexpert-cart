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

    public function getAll()
    {
        try {

            $this->model->leftTable = 'typeproducts ON typeproducts.id = products.type';
            $this->model->colunms = 'products.id, products.name, products.price, typeproducts.price as tax';

            $data = $this->model->select();

            if (!$data) :
                $response = ['message' => 'Nenhum produto encontrado.', 'class' => 'info'];
            endif;

            $response = ['data' => $data];

        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        return Response::set($response);
    }

    public function create()
    {
        try {

            $data = $this->model->create(Input::post($_POST));

            if (!$data) :
                $response = ['message' => 'Produto não foi cadastrado.', 'class' => 'info'];
            endif;

            $response = ['message' => 'Produto cadastrado com sucesso.', 'class' => 'success'];

        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        return Response::set($response);
    }
}
