<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Pendaftaran_M;
use App\Models\Dokter_M;
use App\Models\Users_M;

class Pendaftaran_User extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$model = new Dokter_M();

		$dokter = $model->findAll();
		$data = [
			'dokter' => $dokter,
		];

		return view('Pendaftaran/insert_pendaftaran_user', $data);
	}

	public function read()
	{
		$pager = \Config\Services::pager();
		$model = new Pendaftaran_M();
		//$dokter = $model -> findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pendaftaran',
			//'spesialis' => $dokter,
			// 'daftar' => $model->paginate(3, 'page'),
			// 'pager' => $model->pager,
			'daftar_data' => $model->get_data(),
		];

		return view("Pendaftaran/select_pendaftaran_user", $data);
	}

	public function insert()
	// Melakukan insert data atau menambahkan data
	{
		$request = \Config\Services::request();

		$data = [
			'nama' => $request->getPost('nama'),
			'sakit' => $request->getPost('sakit'),
			'id_dokter' => $request->getPost('id_dokter'),
			'kebutuhan' => $request->getPost('kebutuhan'),
		];

		$model = new Pendaftaran_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/user/pendaftaran/create"));
		} else {
			return redirect()->to(base_url("/user/pendaftaran"));
		}
	}


	public function select()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		echo "<h1>Menampilkan data</h1>";
	}
}
