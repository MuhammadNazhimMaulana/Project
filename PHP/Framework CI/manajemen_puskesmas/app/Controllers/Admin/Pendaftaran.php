<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pendaftaran_M;
use App\Models\Dokter_M;
use App\Models\Users_M;

class Pendaftaran extends BaseController
{
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

		return view("Pendaftaran/select_pendaftaran", $data);
	}

	public function create()
	// Digunakan untuk menampilkan seluruh data dokter
	{
		$model = new Dokter_M();

		$dokter = $model->findAll();
		$data = [
			'dokter' => $dokter,
		];

		return view('Pendaftaran/insert_pendaftaran', $data);
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
			return redirect()->to(base_url("/admin/pendaftaran/create"));
		} else {
			return redirect()->to(base_url("/admin/pendaftaran/read"));
		}
	}

	public function find($id = null)
	// Untuk melakukan update (Sebelum masuk ke form)
	{
		$model_d = new Dokter_M();
		$model = new Pendaftaran_M();

		$daftar = $model->find($id);
		$dokter = $model_d->findAll();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'UPDATE DATA PENDAFTARAN',
			'daftar' => $daftar,
			'dokter' => $dokter,
		];

		return view("Pendaftaran/update_pendaftaran", $data);
	}

	public function update()
	//  Untuk menyimpan hasil dari update tadi
	{
		$id_daftar = $this->request->getPost('id_daftar');

		$data = [
			'nama' => $this->request->getPost('nama'),
			'sakit' => $this->request->getPost('sakit'),
			'id_dokter' => $this->request->getPost('id_dokter'),
			'kebutuhan' => $this->request->getPost('kebutuhan'),
		];

		$model = new Pendaftaran_M();

		if ($model->update($id_daftar, $data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/pendaftaran/find/$id_daftar"));
		} else {
			return redirect()->to(base_url("/admin/pendaftaran/read"));
		}
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Pendaftaran_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/pendaftaran/read"));
	}
}
