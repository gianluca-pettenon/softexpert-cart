<?php

namespace App\Controller;

use App\Core\Controller;

class Admin extends Controller
{
    public function index()
    {
        $this->load('admin/index');
    }
}
