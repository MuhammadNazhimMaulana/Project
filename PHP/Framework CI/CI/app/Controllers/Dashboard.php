<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        $data = [];

        echo view('Templates/header', $data);
        echo view('dashboard');
        echo view('Templates/footer');
    }

    //--------------------------------------------------------------------

}
