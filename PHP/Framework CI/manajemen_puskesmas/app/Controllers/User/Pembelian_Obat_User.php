<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Pembelian_Obat_M;

class Pembelian_Obat_User extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$pager = \Config\Services::pager();
		$model = new Pembelian_Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pembelian Obat',
			//'spesialis' => $dokter,
			// 'pembeli_obat' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'pembeli_obat_data' => $model->get_data(),
		];

		return view("Pembelian_Obat/select_pembelian_obat_user", $data);
	}

	public function select()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		echo "<h1>Menampilkan data</h1>";
	}

	public function selectWhere($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		echo "<h1>Menampilkan data berdasarkan id</h1>";
	}
}
