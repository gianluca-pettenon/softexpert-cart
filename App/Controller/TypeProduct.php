<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Libraries\Response;
use App\Model\ProductModel;

use App\Helper\Input;

class TypeProduct extends Controller
{
    private $model;
    private $table = 'typeproducts';

    public function __construct()
    {
        $this->model = new ProductModel;
        $this->model->table = $this->table;
    }

    public function getAll()
    {
        try {

            $this->model->colunms = ['typeproducts.id', 'typeproducts.name', 'typeproducts.price'];

            $data = $this->model->select();

            if (!$data) :
                $response = ['message' => 'Nenhum tipo de produto encontrado.', 'class' => 'info'];
            endif;

            $response = ['data' => $data];

        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        return Response::json($response);
    }

    public function create()
    {
        try {

            $this->model->colunms = ['typeproducts.name', 'typeproducts.price'];

            $data = $this->model->create(Input::post($_POST));

            if (!$data) :
                $response = ['message' => 'Tipo de produto não foi cadastrado.', 'class' => 'info'];
            endif;

            $response = ['message' => 'Tipo de produto cadastrado com sucesso.', 'class' => 'success'];

        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        return Response::json($response);
    }
}
