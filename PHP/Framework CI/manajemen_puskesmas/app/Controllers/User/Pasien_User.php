<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Pasien_M;

class Pasien_User extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$pager = \Config\Services::pager();
		$model = new Pasien_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Jadwal Pasien',
			//'spesialis' => $dokter,
			// 'pasien' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'pasien_data' => $model->get_data(),
		];

		return view("Pasien/select_pasien_user", $data);
	}


	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
