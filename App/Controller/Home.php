<?php

namespace App\Controller;

use App\Controller\Controller;

class Home extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }
}
