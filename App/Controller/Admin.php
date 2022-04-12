<?php

namespace App\Controller;

use App\Controller\Controller;

class Admin extends Controller
{

    /**
     * @route("/admin", method={"GET"})
     */

    public function index()
    {
        $this->view('admin/index');
    }
}
