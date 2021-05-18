<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Obat_M;

class Obat extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo '<h1>Ini merupakan bagian obat</h1>';
	}

	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Obat_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Obat',
			//'spesialis' => $dokter,
			'obat' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Obat/select_obat", $data);
	}


	public function create()
	// Melakukan insert data atau menambahkan data
	{
		$data = [
			'judul' => 'Insert Data Obat'
		];

		return view("Obat/insert_obat", $data);
	}

	public function insert()
	{
		$request = \Config\Services::request();

		$data = [
			'nama_obat' => $this->request->getPost('nama_obat'),
			'stok' => $this->request->getPost('stok'),
			'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kadaluarsa'),
			'perusahaan' => $this->request->getPost('perusahaan'),
		];

		$model = new Obat_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/obat/create"));
		} else {
			return redirect()->to(base_url("/admin/obat/read"));
		}
	}

	public function find($id = null)
	// Digunakan untuk menampilkan data dokter berdasarkan id
	{
		$model = new Obat_M();

		$obat = $model->find($id);
		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA Obat',
			'obat' => $obat,
		];

		return view("Obat/update_obat", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_obat = $this->request->getPost('id_obat');

		$data = [
			'nama_obat' => $this->request->getPost('nama_obat'),
			'stok' => $this->request->getPost('stok'),
			'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kadaluarsa'),
			'perusahaan' => $this->request->getPost('perusahaan'),
		];

		$model = new Obat_M();

		if ($model->update($id_obat, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/obat/find/$id_obat"));
		} else {
			return redirect()->to(base_url("/admin/obat/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Obat_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/obat/read"));
	}
}
