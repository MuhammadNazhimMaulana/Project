<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Ruang_M;

class Ruang extends BaseController
{

	public function read()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$pager = \Config\Services::pager();
		$model = new Ruang_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Ruangan',
			//'spesialis' => $dokter,
			'room' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Ruang/select_ruang", $data);
	}

	public function create()
	// Melakukan insert data atau menambahkan data
	{
		$data = [
			'judul' => 'Insert Data Ruang'
		];

		return view("Ruang/insert_ruang", $data);
	}

	public function insert()
	{
		$request = \Config\Services::request();

		$data = [
			'nama_ruang' => $this->request->getPost('nama_ruang'),
			'kapasitas' => $this->request->getPost('kapasitas'),
		];

		$model = new Ruang_M();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/ruang/create"));
		} else {
			return redirect()->to(base_url("/admin/ruang/read"));
		}
	}

	public function find($id = null)
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$model = new Ruang_M();

		$ruang = $model->find($id);
		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA RUANG',
			'ruang' => $ruang,
		];

		return view("Ruang/update_ruang", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_ruang = $this->request->getPost('id_ruang');

		$data = [
			'nama_ruang' => $this->request->getPost('nama_ruang'),
			'kapasitas' => $this->request->getPost('kapasitas'),
		];

		$model = new Ruang_M();

		if ($model->update($id_ruang, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/ruang/find/$id_ruang"));
		} else {
			return redirect()->to(base_url("/admin/ruang/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Ruang_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/ruang/read"));
	}
}
