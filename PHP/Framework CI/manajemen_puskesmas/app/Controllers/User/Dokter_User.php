<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Dokter_M;

class Dokter_User extends BaseController
{
	public function index()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Dokter_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'DATA DOKTER',
			//'spesialis' => $dokter,
			'spesialis' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Dokter/select_user_dokter", $data);
	}

	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
