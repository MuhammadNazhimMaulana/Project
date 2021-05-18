<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Transaksi_M;

class Transaksi_User extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$pager = \Config\Services::pager();
		$model = new Transaksi_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Transaksi',
			//'spesialis' => $dokter,
			// 'trans' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'trans_data' => $model->get_data(),
		];

		return view("Transaksi/select_transaksi_user", $data);
	}

	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
