<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin_Page extends BaseController
{
	public function index()
	{
		return view('template/dashboard/dashboard_admin');
	}
	public function side()
	{
		return view('template/side_bar');
	}
}
