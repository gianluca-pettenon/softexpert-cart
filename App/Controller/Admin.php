<?php

namespace App\Controller;

use App\Core\Controller;

class Admin extends Controller
{
    public function index()
    {
        $this->view('admin/index');
    }
}
