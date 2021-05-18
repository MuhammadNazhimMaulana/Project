<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class User_Page extends BaseController
{
    public function index()
    {
        return view('template/main');
    }
    public function masuk()
    {
        return view('template/dashboard/dashboard_user');
    }
}
