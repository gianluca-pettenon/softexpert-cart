<?php

namespace App\Controller;

use App\Core\Controller;

class Home extends Controller
{
    public function index()
    {
        $this->load('home/index');
    }
}
