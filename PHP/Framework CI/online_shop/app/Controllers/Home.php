<?php

namespace App\Controllers;

use App\Models\Barang_Model;

class Home extends BaseController
{
	public function index()
	{
		return view('Users/dashboard_user');
	}

	public function front()
	{

		$barang = new Barang_Model();

		$model = $barang->findAll();

		$data = [
			'model' => $model
		];

		return view('template/panel_aplikasi', $data);
	}
}
