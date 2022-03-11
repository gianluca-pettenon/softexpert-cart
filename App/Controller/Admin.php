<?php

namespace App\Controller;

use App\Controller\Controller;

class Admin extends Controller
{
    public function index()
    {
        $this->view('admin/index');
    }
}
