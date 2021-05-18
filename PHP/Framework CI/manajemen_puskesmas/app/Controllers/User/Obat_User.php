<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Obat_M;

class Obat_User extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$pager = \Config\Services::pager();
		$model = new Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Obat',
			//'spesialis' => $dokter,
			'obat' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Obat/select_obat_user", $data);
	}


	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
