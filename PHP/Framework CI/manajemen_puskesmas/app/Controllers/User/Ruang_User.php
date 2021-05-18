<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Ruang_M;

class Ruang_User extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$pager = \Config\Services::pager();
		$model = new Ruang_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Ruangan',
			//'spesialis' => $dokter,
			'room' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Ruang/select_ruang_user", $data);
	}


	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
