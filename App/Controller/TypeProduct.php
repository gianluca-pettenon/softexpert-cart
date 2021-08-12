<?php

namespace App\Controller;

use App\Core\Controller;
use App\Libraries\Response;
use App\Model\ProductModel;

use App\Helper\Input;

class TypeProduct extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel;
    }

    public function getAll()
    {
        try {

            $this->model->table = 'typeproducts';
            $this->model->colunms = ['id', 'name', 'price'];

            $data = $this->model->select();

            if (!$data) :
                $response = ['message' => 'Nenhum tipo de produto encontrado.', 'class' => 'info'];
            endif;

            $response = ['message' => 'Produto carregado com sucesso.', 'class' => 'success', 'data' => $data];
        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        Response::set($response);
        return Response::get();
    }

    public function create()
    {
        try {

            $this->model->table = 'typeproducts'; 
            $this->model->colunms = ['name', 'price'];

            $data = $this->model->create(Input::post($_POST));

            if (!$data) :
                $response = ['message' => 'Tipo de produto não foi cadastrado.', 'class' => 'info'];
            endif;

            $response = ['message' => 'Tipo de produto cadastrado com sucesso.', 'class' => 'success'];

        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        Response::set($response);
        return Response::get();
    }
}
