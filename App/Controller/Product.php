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

    public function get()
    {
        try {

            $data = $this->model->select();

            if ($data) :
                $response = ['message' => 'Produto carregado com sucesso.', 'class' => 'success', 'data' => $data];
            endif;
            
        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        Response::set($response);
        return Response::get();
    }

    public function create()
    {
        try {

            $data = $this->model->create(Input::post($_POST));

            if ($data) :
                $response = ['message' => 'Produto cadastrado com sucesso.', 'class' => 'success'];
            endif;

        } catch (\Exception $e) {
            $response = ['message' => $e->getMessage()];
        }

        Response::set($response);
        return Response::get();
    }
}
