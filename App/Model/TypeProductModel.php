<?php

namespace App\Model;

use App\Model\ProductModel;

class TypeProductModel extends ProductModel
{

    public function test()
    {
        return parent::create('null');
    }

}
