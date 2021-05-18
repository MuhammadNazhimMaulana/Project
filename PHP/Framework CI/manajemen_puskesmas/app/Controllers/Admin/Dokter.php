<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Dokter_M;

class Dokter extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo '<h1>Ini merupakan bagian dokter</h1>';
	}

	public function read()
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

		return view("Dokter/select", $data);
	}

	public function create()
	// Melakukan insert data atau menambahkan data
	{
		echo view("Dokter/insert");
	}

	public function insert()
	{
		$model = new Dokter_M();
		if ($model->insert($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['nama_dokter']);
			return redirect()->to(base_url("/admin/dokter/create"));
		} else {
			return redirect()->to(base_url("/admin/dokter"));
		}
	}

	public function find($id = null)
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$model = new Dokter_M();
		$dokter = $model->find($id);

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA DOKTER',
			'dokter' => $dokter
		];

		return view("Dokter/update", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$model = new Dokter_M();
		$id = $_POST['id_dokter'];

		if ($model->save($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['nama_dokter']);
			return redirect()->to(base_url("/admin/dokter/find/$id"));
		}
		return redirect()->to(base_url("/admin/dokter"));
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{

		$model = new Dokter_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/dokter"));
	}
}
